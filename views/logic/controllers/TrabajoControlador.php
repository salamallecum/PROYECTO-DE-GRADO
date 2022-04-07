<?php

class TrabajoControlador{

    //Funcion que permite mostrar los trabajos destacados
    public function mostrarDatosTrabajosDestacados($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

     //Funcion que permite el registro de los trabajos destacados
     public function insertarTrabajoDestacado(TrabajoDestacado $trabDestacado){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idTrabajo = $trabDestacado->getId();
        $idDelestudiante = $trabDestacado->getIdDelEstudiante();
        $nombreTrabajo = $trabDestacado->getNombre();
        $descripcionTrabajo = $trabDestacado->getDescripcion();
        $trabajoAplicadoAActividad = $trabDestacado->getTrabajoAplicadoActividad();
        $elTrabTieneBadge = $trabDestacado->getTrabajoTieneBadge();
        $publicadoEnEport = $trabDestacado->getPublicadoEnEportafolio();
        
                
        $sql = "INSERT INTO tbl_trabajodestacado (Id, Id_estudiante, nombre_trabajo, descripcion, fueAplicadoAActividad, trabajoTieneBadge, publicadoeneportafolio)
                            values ($idTrabajo, $idDelestudiante, '$nombreTrabajo', '$descripcionTrabajo', '$trabajoAplicadoAActividad', '$elTrabTieneBadge', '$publicadoEnEport')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que permite cargar una imagen del trabajo destacado
    public function subirImagenTrabajo($rutaImg, $nombreImg, $imgTrabajo, $nomTrabajo){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta trabajosImages
        if(!file_exists('../trabajosImages')){
            mkdir('../trabajosImages', 0777, true);

            if(file_exists('../trabajosImages')){
                if(move_uploaded_file($rutaImg, '../trabajosImages/'. $imgTrabajo)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagen = "UPDATE tbl_trabajodestacado SET nombre_imagentrabajo='$nombreImg' WHERE nombre_trabajo='$nomTrabajo'";
                    $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("../trabajosImages/".$imgTrabajo, "../trabajosImages/".$nombreImg);

                }else{
                    echo "La imagen del trabajo no se pudo guardar";
                }
            }
        }else{
            if(move_uploaded_file($rutaImg, '../trabajosImages/'. $imgTrabajo)){

                //Guardamos el nombre de la imagen en la base de datos
                $queryGuardarNombreImagen = "UPDATE tbl_trabajodestacado SET nombre_imagentrabajo='$nombreImg' WHERE nombre_trabajo='$nomTrabajo'";
                $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                //Renombramos la imagen con el nombre guardado en bd 
                rename("../trabajosImages/".$imgTrabajo, "../trabajosImages/".$nombreImg);

            }else{
                echo "La imagen del trabajo no se pudo guardar";
            }
        } 
    }

    //Funcion que actualiza en base de datos el link de evidencia de documento de un trabajo destacado
    public function actualizarLinkDocumentoTrabDestacado(string $linkEvidencDocumento, string $nombreDeTrabajo){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_documento = '$linkEvidencDocumento' WHERE  nombre_trabajo='$nombreDeTrabajo'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que actualiza en base de datos el link de evidencia de video de un trabajo destacado
    public function actualizarLinkVideoTrabDestacado(string $linkEvidencVideo, string $nombreDeTrabajo){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_video = '$linkEvidencVideo' WHERE  nombre_trabajo='$nombreDeTrabajo'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que actualiza en base de datos el link de evidencia de repositorio de codigo de un trabajo destacado
    public function actualizarLinkRepoCodigoTrabDestacado(string $linkEvidencRepo, string $nombreDeTrabajo){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_repocodigo = '$linkEvidencRepo' WHERE  nombre_trabajo='$nombreDeTrabajo'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que actualiza en base de datos el link de evidencia de repositorio de codigo de un trabajo destacado
    public function actualizarLinkPresentacionTrabDestacado(string $linkEvidencPresent, string $nombreDeTrabajo){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_presentacion = '$linkEvidencPresent' WHERE  nombre_trabajo='$nombreDeTrabajo'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite actualizar la informacion de un trabajo destacado
    public function actualizarTrabajoDestacado(int $idTrabajoDestacadoEdit, string $nombreTrabajoEdit, string $descripcionTrabEdit, string $sePublicaTrabEdit){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_trabajodestacado SET nombre_trabajo='$nombreTrabajoEdit', descripcion='$descripcionTrabEdit', publicadoeneportafolio='$sePublicaTrabEdit'
                            WHERE  Id=$idTrabajoDestacadoEdit";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite consultar el nombre de la imagen de un trabajo destacado
    public function consultarNombreImagenTrabajoDestacado(int $idTrab){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT nombre_imagentrabajo from tbl_trabajodestacado where Id = $idTrab";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['nombre_imagentrabajo'];
        }
    }

    //Funcion que elimina de base de datos el nombre de una imagen de un trabajo destacado
    public function limpiarNombreImagenTrabajoDestacado(int $idTr, string $nombreImgTrabDestacado){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET nombre_imagentrabajo = null WHERE  nombre_imagentrabajo='$nombreImgTrabDestacado' and Id=".$idTr;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que permite eliminar la imagen de un trabajo destacado
    public function eliminarImagen(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/trabajosImages/".$nomImg;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "La imagen ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró la imagen ($nomImg)";
        }
    }

    //Funcion que elimina de base de datos el link del documento de un trabajo destacado
    public function limpiarLinkDocumentoTrabDestacado(int $idTab){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_documento = null WHERE Id=".$idTab;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el link del video de un trabajo destacado
    public function limpiarLinkVideoTrabDestacado(int $idTab){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_video = null WHERE Id=".$idTab;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el link del video de un trabajo destacado
    public function limpiarLinkRepoCodigoTrabDestacado(int $idTab){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_repocodigo = null WHERE Id=".$idTab;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que elimina de base de datos el link del video de un trabajo destacado
    public function limpiarLinkPresentacionTrabDestacado(int $idTab){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_trabajodestacado SET link_presentacion = null WHERE Id=".$idTab;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 

    //Funcion que nos permite verificar si un trabajo destacado ha ganado insignias en la plataforma
    public function verificarSiElTrabajoDestacadoHaGanadoBadges(int $idDelTrab){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT Id from tbl_trabajodestacado where Id = $idDelTrab and trabajoTieneBadge = 'No'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['Id'];
        }
    } 

    //Funcion que permite eliminar un trabajo destacado
    public function eliminarTrabajoDestacado(int $idTrab){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE  from tbl_trabajodestacado where Id = $idTrab";

        //Consultamos si tiene imagen almacenada en el servidor
        $nombreImagen = (string) $this->consultarNombreImagenTrabajoDestacado($idTrab);

        //Validamos que el trabajo tenga un nombre de imagen 
        if($nombreImagen != null){
            $this->eliminarImagen($nombreImagen);
        }
                   
        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite eliminar las aplicaciones realizadas por el estudiante para un trabajo destacado
    public function eliminarAplicacionesDelTrabajo(int $idTrabajo){

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE from tbl_aplicaciondetrabajos where id_trabajo =".$idTrabajo;     
               
        return $result = mysqli_query($conexion, $sql);
    }
}
?>