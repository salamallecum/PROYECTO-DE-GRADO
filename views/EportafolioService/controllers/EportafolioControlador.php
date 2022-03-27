<?php

require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/template_Eportafolio.php";
require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/utils/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/utils/generadorDeNombres.php";

//Cargamos las funciones del API de google
include 'api-google/vendor/autoload.php';

class EportafolioControlador{

    //Funcion que permite enviar un correo con el link del eportafolio para que sea compartido a un usuario empleador
    public function compartirEportafolio(int $idDelEstudiante, string $destinatario){

        //Verificamos si el eportafolio del estudiante fue cargado a drive con anterioridad
        $elEportafolioYaTieneUnLinkRegistradoConAnterioridad = $this->evaluarSiUnEportafolioTieneLink($idDelEstudiante);

        if($elEportafolioYaTieneUnLinkRegistradoConAnterioridad != null){
            $linkDelEportafolio = $this->consultarLinkDeUnEportafolio($idDelEstudiante);
            $this->enviarCorreo($destinatario, $linkDelEportafolio);
            return true;
            
        }else{

            //Generamos el archivo pdf del eportafolio del estudiante (esta funcion crea un archivo pdf temporal en la carpeta tempEportafolio)
            $nombreEportafolioPDFFile = $this->generarPDFDeUnEportafolio($idDelEstudiante);

            //Actualizamos el nombre del arhivo pdf generado para el eportafolio en BD
            $this->actualizarNombreDeArchivoPDFEportafolio($idDelEstudiante, $nombreEportafolioPDFFile);

            //Subimos el archivo PDF del eportafolio a Google Drive y obtenemos su link de acceso
            $linkDelNvoEportafolio = $this->subirArchivoPDFDeUnEportafolio($nombreEportafolioPDFFile);

            //Guardamos el link generado en Drive para el eportafolio en BD
            $this->actualizarLinkDelEportafolioDeUnEstudiante($idDelEstudiante, $linkDelNvoEportafolio);

            //Enviamos el correo al interesado con su respectivo link del eportafolio para su acceso
            $this->enviarCorreo($destinatario, $linkDelNvoEportafolio);

            //Eliminamos el archivo PDF del eportafolio generado de la carpeta tempEportafolio
            $this->eliminarArchivoPDFTemporal($nombreEportafolioPDFFile);
            
            return true;
            
        }
    }

    //Funcion que permite actualizar el nombre del archivo Pdf de un eportafolio generado como pdf
    public function actualizarNombreDeArchivoPDFEportafolio(int $idEp, string $nombreDelArchiEport){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_eportafolio SET nombreArchivoEportafolio ='$nombreDelArchiEport' WHERE Id_estudiante=$idEp";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Función que evalúa si un eportafolio ya fue generado como PDF con anterioridad
    public function evaluarSiUnEportafolioTieneLink(int $id){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT linkPortafolioParaCompartir from tbl_eportafolio where Id_estudiante =".$id;
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['linkPortafolioParaCompartir'];
        }

    }

    //Funcion que permite generar el pdf de un eportafolio seleccionado para su divulgación
    public function generarPDFDeUnEportafolio(int $idEst){
        
        $generador = new generadorNombres();

        //Importamos el codigo css de la plantilla
        $css = file_get_contents($_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/templateStyles/EportafolioStyles.css");

        //Importamos la platilla del eportafolio
        $plantillaEportafolio = getEportafolio($idEst);

        //Aqui definimos los formatos qeu queremos que tenga la hoja
        $mpdf = new \Mpdf\Mpdf([
            "format" => "Legal-L"     
        ]);

        //Con esta función podemos paginar el pdf
        $mpdf->SetFooter('{PAGENO}');


        //Imprimimos los estilos css del pdf
        $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

        //Imprimimos codigo html en un pdf
        $mpdf->writeHtml($plantillaEportafolio, \Mpdf\HTMLParserMode::HTML_BODY);

        //Obtenemos un nombre para el pdf del estudiante a generar y con el que se va abuscar en la carpeta temporal
        $nombreDelEportafolioPDF = $generador->generadorDeNombres().".pdf";

        //generamos el portafolio pdf y lo guardamos en la carpeta de eportafolios temporal
        $mpdf->Output($nombreDelEportafolioPDF, "F");
        //$mpdf->Output($nombreDelEportafolioPDF, "F");

        //Retornamos el nombre del archivo del eportafolio para su busqueda posterior en la carpeta temporal de eportafolios
        return $nombreDelEportafolioPDF;

    }

    //Funcion que permite actualizar el link del eportafolio de un estudiante en BD
    public function actualizarLinkDelEportafolioDeUnEstudiante(int $idEst, string $linkAAactualizar){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_eportafolio SET linkPortafolioParaCompartir='$linkAAactualizar' WHERE Id_estudiante=".$idEst;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }
    
    //Funcion que permite subir el archivo PDF de un eportafolio a Google Drive para su divulgación
    public function subirArchivoPDFDeUnEportafolio(string $nombreDelArchivoPDFTemporalEportafolio){

        //Cargamos el archivos json de credenciales
        putenv('GOOGLE_APPLICATION_CREDENTIALS='. $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/EportafolioService/controllers/proyectopandora-345323-5d2a7d831ff4.json");

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);

        //Aqui creamos la funcionalidad para cargar los PDF al Drive
        try{

            $service = new Google_Service_Drive($client);

            //Aqui le pasamos el archivo que deseamos que cargue en el drive
            $file_path = $nombreDelArchivoPDFTemporalEportafolio;
           
            //Metadatos del archivo
            $file = new Google_Service_Drive_DriveFile();
            $file->setName($file_path);

            //Obtenemos el mime type
            $finfo = finfo_open(FILEINFO_MIME_TYPE); 
            $mime_type=finfo_file($finfo, $file_path);

            $file->setParents(array("1eevm-VSLcZj8qFkwzrlDkeb3FmjaPbfo"));
            
            //Agregamos una descripcion al archivo
            $file->setDescription("Carga de Eportafolio de estudianta desde PHP");
            $file->setMimeType($mime_type);

            //Cargamos el archivo en google drive
            $resultado = $service->files->create(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime_type,
                    'uploadType' => 'media'
                )
            );

            $driveLink = $resultado->id;
            return $driveLink;

        } catch(Google_Service_Exception $gs){
            $mensaje = json_decode($gs->getMessage());
            echo $mensaje->error->message();
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    //Funcion que permite consultar el link del arhivo PDF de un eportafolio en BD para su divulgación
    public function consultarLinkDeUnEportafolio(int $idEstudiante){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT linkPortafolioParaCompartir from tbl_eportafolio where Id_estudiante = $idEstudiante";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['linkPortafolioParaCompartir'];
        }
    }

    //Funcion que permite eliminar el archivo temporal de eportafolio de la carpeta tempEportafolio
    public function eliminarArchivoPDFTemporal(string $fileAEliminar){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/EportafolioService/".$fileAEliminar;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "El eportafolio PDF temporal ($fileAEliminar) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró el eportafolio PDF temporal ($fileAEliminar)";
        }
    }

    //Funcion que permite enviar correo electronico
    public function enviarCorreo(string $correoDestino, string $linkEportafolio){

        //Definimos el contenido del correo electronico que se le va a enviar alusuario con quien se ocmparte el eportafolio
        $desde = "From:". "Equipo Pandora";
        $asunto = "PANDORA - Se ha compartido un eportafolio contigo";
        $mensaje = 'Buen día:'.PHP_EOL.
                    'La Universidad El Bosque por medio del sistema de certificación de Competencias PANDORA ha compartido con usted un eportafolio, esto con el fin de que sea tenido en cuenta en sus procesos de selección.'.PHP_EOL.
                    'Podrá acceder a él dando click en el siguiente enlace:'.PHP_EOL.
                    'https://drive.google.com/open?id='.$linkEportafolio.PHP_EOL.
                    'Saludos cordiales.';                
        
        //Enviamos el correo
        mail($correoDestino, $asunto, $mensaje, $desde);
    }

}

?>