<?php

    require_once "utils/Conexion.php";
    require_once "controllers/ConvocatoriaControlador.php";
    require_once "model/ConvocatoriaComite.php";
    require_once "model/ConvocatoriaPracticas.php";
    require_once "utils/generadorDeNombres.php";

    //Capturamos el evento del boton de registro de convocatorias del rol comite
    if(isset($_POST['guardarConvocatoriaComite'])){

        //Capturamos los datos de los campos del formulario
        $nombreDeConvocatoriaComite = trim($_POST['nombreConvocatoria']);
        $descripcionConvocatoriaComite = trim($_POST['descripcionConvocatoria']);
        $fechaInicioConvComite = date('Y-m-d', strtotime($_POST['dateFechaInicioConvocatoria']));
        $fechaFinConvComite = date('Y-m-d', strtotime($_POST['dateFechaFinConvocatoria']));
        $cmbProfesorEncargado = $_REQUEST['cmbProfesor'];
        

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeConvocatoriaComite) >= 1 && 
        strlen($descripcionConvocatoriaComite) >= 1 && 
        $fechaInicioConvComite != '1970-01-01' &&
        $fechaFinConvComite != '1970-01-01' &&
        $cmbProfesorEncargado != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo ConvocatoriaComite
            $nuevaConvComite = new ConvocatoriaComite(0, $nombreDeConvocatoriaComite, $descripcionConvocatoriaComite, $fechaInicioConvComite, $fechaFinConvComite, $cmbProfesorEncargado);

            //Creamos el objeto controlador que invocará los metodos CRUD
            $convocatoriaControla = new ConvocatoriaControlador();

            if($convocatoriaControla->insertarConvocatoriaComite($nuevaConvComite) == 1){
                
                $imagenDeLaConvComite = $_FILES['imgParaConvocatoria']['name'];
                $enunciadoDeLaConvComite = $_FILES['archivoInfoDeConvocatoria']['name'];

                //Verificamos si el usuario ha subido una imagen para la convocatoria comite
                if(strlen($imagenDeLaConvComite) >= 1){
                    
                    $rutaDeImagenConvCom = $_FILES['imgParaConvocatoria']['tmp_name'];
                    $generador = new generadorNombres();
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $convocatoriaControla->subirImagenConvocatoriaComite($rutaDeImagenConvCom, $nuevoNombreArchivoImagen, $imagenDeLaConvComite, $nombreDeConvocatoriaComite);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la convocatoria comite 
                if(strlen($enunciadoDeLaConvComite) >= 1){
                    
                    $rutaDeEnunciadoConvCom = $_FILES['archivoInfoDeConvocatoria']['tmp_name'];
                    $generador = new generadorNombres();
                    $nuevoNombreArchivoEnunciado = $generador->generadorDeNombres().".pdf";
                    $convocatoriaControla->subirEnunciadoConvocatoriaComite($rutaDeEnunciadoConvCom, $nuevoNombreArchivoEnunciado, $enunciadoDeLaConvComite, $nombreDeConvocatoriaComite);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Convocatoria registrada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Convocatoria</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }        
        
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>  
            <?php
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    } 
    
    //Capturamos el evento del boton de registro de convocatorias del rol practicas
    if(isset($_POST['guardarConvocatoriaPracticas'])){

        //Capturamos los datos de los campos del formulario
        $nombreDeConvocatoriaPracticas = trim($_POST['nombreConvocatoriaExt']);
        $descripcionConvocatoriaPracticas = trim($_POST['descripcionConvocatoriaExt']);
        $fechaInicioConvPracticas = date('Y-m-d', strtotime($_POST['dateFechaInicioConvocatoriaExt']));
        $fechaFinConvPracticas = date('Y-m-d', strtotime($_POST['dateFechaFinConvocatoriaExt']));
                

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeConvocatoriaPracticas) >= 1 && 
        strlen($descripcionConvocatoriaPracticas) >= 1 && 
        $fechaInicioConvPracticas != '1970-01-01' &&
        $fechaFinConvPracticas != '1970-01-01'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo ConvocatoriaComite
            $nuevaConvPracticas = new ConvocatoriaPracticas(0, $nombreDeConvocatoriaPracticas, $descripcionConvocatoriaPracticas, $fechaInicioConvPracticas, $fechaFinConvPracticas);

            //Creamos el objeto controlador que invocará los metodos CRUD
            $convocatoriaControla = new ConvocatoriaControlador();

            if($convocatoriaControla->insertarConvocatoriaPracticas($nuevaConvPracticas) == 1){
                
                $imagenDeLaConvPracticas = $_FILES['imgParaConvocatoriaExt']['name'];
                $enunciadoDeLaConvPracticas = $_FILES['archivoInfoDeConvocatoriaExt']['name'];

                //Verificamos si el usuario ha subido una imagen para la convocatoria comite
                if(strlen($imagenDeLaConvPracticas) >= 1){
                    
                    $rutaDeImagenConvPracti = $_FILES['imgParaConvocatoriaExt']['tmp_name'];
                    $generador = new generadorNombres();
                    $nuevoNombreArchivoImagenPrac = $generador->generadorDeNombres().".jpg";
                    $convocatoriaControla->subirImagenConvocatoriaPracticas($rutaDeImagenConvPracti, $nuevoNombreArchivoImagenPrac, $imagenDeLaConvPracticas, $nombreDeConvocatoriaPracticas);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la convocatoria comite 
                if(strlen($enunciadoDeLaConvPracticas) >= 1){
                    
                    $rutaDeEnunciadoConvPracti = $_FILES['archivoInfoDeConvocatoriaExt']['tmp_name'];
                    $generador = new generadorNombres();
                    $nuevoNombreArchivoEnunciadoPrac = $generador->generadorDeNombres().".pdf";
                    $convocatoriaControla->subirEnunciadoConvocatoriaPracticas($rutaDeEnunciadoConvPracti, $nuevoNombreArchivoEnunciadoPrac, $enunciadoDeLaConvPracticas, $nombreDeConvocatoriaPracticas);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Convocatoria registrada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Convocatoria</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }        
        
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>  
            <?php
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    } 

?>