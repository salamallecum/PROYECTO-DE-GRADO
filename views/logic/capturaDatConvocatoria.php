<?php

    require_once "utils/Conexion.php";
    require_once "controllers/ConvocatoriaControlador.php";
    require_once "model/ConvocatoriaComite.php";
    require_once "model/ConvocatoriaPracticas.php";
    require_once "utils/generadorDeNombres.php";

    $generador = new generadorNombres();

    //Creamos el objeto controlador que invocará los metodos CRUD
    $convocatoriaControla = new ConvocatoriaControlador();

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

            
            if($convocatoriaControla->insertarConvocatoriaComite($nuevaConvComite) == 1){
                
                $imagenDeLaConvComite = $_FILES['imgParaConvocatoria']['name'];
                $enunciadoDeLaConvComite = $_FILES['archivoInfoDeConvocatoria']['name'];

                //Verificamos si el usuario ha subido una imagen para la convocatoria comite
                if(strlen($imagenDeLaConvComite) >= 1){
                    
                    $rutaDeImagenConvCom = $_FILES['imgParaConvocatoria']['tmp_name'];
                    
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $convocatoriaControla->subirImagenConvocatoriaComite($rutaDeImagenConvCom, $nuevoNombreArchivoImagen, $imagenDeLaConvComite, $nombreDeConvocatoriaComite);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la convocatoria comite 
                if(strlen($enunciadoDeLaConvComite) >= 1){
                    
                    $rutaDeEnunciadoConvCom = $_FILES['archivoInfoDeConvocatoria']['tmp_name'];
                  
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

    //Capturamos el evento del boton de actualizacion de convocatorias del rol comite
    if(isset($_POST['actualizarConvocatoriaComite'])){

        //Capturamos los datos de los campos del formulario
        $idDeConvComiteActualizar = trim($_POST['Id']);
        $nombreDeConvocatoriaComiteEdit = trim($_POST['nombre_convocatoria']);
        $descripcionConvocatoriaComiteEdit = trim($_POST['descripcion_convocatoria']);
        $fechaInicioConvComiteEdit = trim($_POST['fecha_inicio']);
        $fechaFinConvComiteEdit = trim($_POST['fecha_fin']);
        $profesorEncargadoEdit = trim($_POST['id_usuario']);;
        

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeConvocatoriaComiteEdit) >= 1 && 
        strlen($descripcionConvocatoriaComiteEdit) >= 1 && 
        strlen($fechaInicioConvComiteEdit) >= 1 &&
        strlen($fechaFinConvComiteEdit) >= 1 &&
        $profesorEncargadoEdit != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo ConvocatoriaComite
            $convocatoriaComiteActualizar = new ConvocatoriaComite($idDeConvComiteActualizar, $nombreDeConvocatoriaComiteEdit, $descripcionConvocatoriaComiteEdit, $fechaInicioConvComiteEdit, $fechaFinConvComiteEdit, $profesorEncargadoEdit);
            
            if($convocatoriaControla->actualizarConvocatoriaComite($convocatoriaComiteActualizar) == 1){
                
                $imagenEditDeConvComite = $_FILES['imgParaConvocatoriaEdit']['name'];
                $enunciadoEditDeConvComite = $_FILES['archivoInfoDeConvocatoriaEdit']['name'];

                //Verificamos si el usuario ha subido una imagen para la convocatoria comite
                if(strlen($imagenEditDeConvComite) >= 1){
                    
                    $rutaDeImagenConvComEdit = $_FILES['imgParaConvocatoriaEdit']['tmp_name'];

                    //Consultamos si la convocatoria ya tiene una imagen previa en servidor
                    $nombreAntiguaImagenConvComEdit = $convocatoriaControla->consultarNombreImagenConvocatoriaComite($idDeConvComiteActualizar);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagenConvComEdit != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $convocatoriaControla->limpiarNombreImagenConvocatoriaComite($nombreAntiguaImagenConvComEdit);
                       //Eliminamos la imagen previa en servidor de la convocatoria
                       $convocatoriaControla->eliminarImagen($nombreAntiguaImagenConvComEdit);

                       $nuevoNombreArchivoImagenConvComAEditar = $generador->generadorDeNombres().".jpg";
                       $convocatoriaControla->subirImagenConvocatoriaComite($rutaDeImagenConvComEdit, $nuevoNombreArchivoImagenConvComAEditar, $imagenEditDeConvComite, $nombreDeConvocatoriaComiteEdit);
                    }

                    $nuevoNombreArchivoImagenConvComEdit = $generador->generadorDeNombres().".jpg";
                    $convocatoriaControla->subirImagenConvocatoriaComite($rutaDeImagenConvComEdit, $nuevoNombreArchivoImagenConvComEdit, $imagenEditDeConvComite, $nombreDeConvocatoriaComiteEdit);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la convocatoria comite
                if(strlen($enunciadoEditDeConvComite) >= 1){
                    
                    $rutaDeEnunciadoConvComEdit = $_FILES['archivoInfoDeConvocatoriaEdit']['tmp_name'];

                    //Consultamos si la convocatoria ya tiene un enunciado previo en servidor
                    $nombreAntiguoEnunciadoConvComEdit = $convocatoriaControla->consultarNombreEnunciadoConvocatoriaComite($idDeConvComiteActualizar);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciadoConvComEdit != null){
                       //Eliminamos el nombre del enunciado en base de datos 
                       $convocatoriaControla->limpiarNombreEnunciadoConvocatoriaComite($nombreAntiguaImagenConvComEdit);
                       //Eliminamos el enunciado previo en servidor de la convocatoria
                       $convocatoriaControla->eliminarEnunciado($nombreAntiguaImagenConvComEdit);

                       $nuevoNombreArchivoEnunciadoConvComAEditar = $generador->generadorDeNombres().".pdf";
                       $convocatoriaControla->subirEnunciadoConvocatoriaComite($rutaDeEnunciadoConvComEdit, $nuevoNombreArchivoEnunciadoConvComAEditar, $enunciadoEditDeConvComite, $nombreDeConvocatoriaComiteEdit);
                    }

                    $nuevoNombreArchivoEnunciadoConvComEdit = $generador->generadorDeNombres().".pdf";
                    $convocatoriaControla->subirEnunciadoConvocatoriaComite($rutaDeEnunciadoConvComEdit, $nuevoNombreArchivoEnunciadoConvComEdit, $enunciadoEditDeConvComite, $nombreDeConvocatoriaComiteEdit);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Convocatoria actualizada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Convocatoria</h3>  
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

            
            if($convocatoriaControla->insertarConvocatoriaPracticas($nuevaConvPracticas) == 1){
                
                $imagenDeLaConvPracticas = $_FILES['imgParaConvocatoriaExt']['name'];
                $enunciadoDeLaConvPracticas = $_FILES['archivoInfoDeConvocatoriaExt']['name'];

                //Verificamos si el usuario ha subido una imagen para la convocatoria comite
                if(strlen($imagenDeLaConvPracticas) >= 1){
                    
                    $rutaDeImagenConvPracti = $_FILES['imgParaConvocatoriaExt']['tmp_name'];
                   
                    $nuevoNombreArchivoImagenPrac = $generador->generadorDeNombres().".jpg";
                    $convocatoriaControla->subirImagenConvocatoriaPracticas($rutaDeImagenConvPracti, $nuevoNombreArchivoImagenPrac, $imagenDeLaConvPracticas, $nombreDeConvocatoriaPracticas);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la convocatoria comite 
                if(strlen($enunciadoDeLaConvPracticas) >= 1){
                    
                    $rutaDeEnunciadoConvPracti = $_FILES['archivoInfoDeConvocatoriaExt']['tmp_name'];
                   
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

    //Capturamos el evento del boton de actualizacion de convocatorias del rol practicas
    if(isset($_POST['actualizarConvocatoriaPracticas'])){

        //Capturamos los datos de los campos del formulario
        $idDeConvPracticasActualizar = trim($_POST['idConvocatoriaPractAEditar']);
        $nombreDeConvocatoriaPracticasAEdit = trim($_POST['nombreConvocatoriaPractEdit']);
        $descripcionConvocatoriaPracticasAEdit = trim($_POST['descripcionConvocatoriaPractEdit']);
        $fechaInicioConvPracticasAEdit = date('Y-m-d', strtotime($_POST['dateFechaInicioConvocatoriaExtEdit']));
        $fechaFinConvPracticasAEdit = date('Y-m-d', strtotime($_POST['dateFechaFinConvocatoriaExtEdit']));
                

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeConvocatoriaPracticaseEdit) >= 1 && 
        strlen($descripcionConvocatoriaPracticasEdit) >= 1 && 
        $fechaInicioConvPracticasEdit != '1970-01-01' &&
        $fechaFinConvPracticasEdit != '1970-01-01'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo ConvocatoriaPracticas
            $convocatoriaPracticasActualizar = new ConvocatoriaPracticas($idDeConvPracticasActualizar, $nombreDeConvocatoriaPracticasAEdit, $descripcionConvocatoriaPracticasAEdit, $fechaInicioConvPracticasAEdit, $fechaFinConvPracticasAEdit);
            
            if($convocatoriaControla->actualizarConvocatoriaPracticas($convocatoriaPracticasActualizar) == 1){
                
                $imagenEditDeConvPracticas = $_FILES['imgParaConvocatoriaExtEdit']['name'];
                $enunciadoEditDeConvPracticas = $_FILES['archivoInfoDeConvocatoriaExtEdit']['name'];

                //Verificamos si el usuario ha subido una imagen para la convocatoria Practicas
                if(strlen($imagenEditDeConvPracticas) >= 1){
                    
                    $rutaDeImagenConvPracEdit = $_FILES['imgParaConvocatoriaExtEdit']['tmp_name'];

                    //Consultamos si la convocatoria ya tiene una imagen previa en servidor
                    $nombreAntiguaImagenConvPracEdit = $convocatoriaControla->consultarNombreImagenConvocatoriaPracticas($idDeConvPracticasActualizar);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagenConvPracEdit != null){
                        $convocatoriaControla->eliminarImagen($nombreAntiguaImagenConvPracEdit);
                    }

                    $nuevoNombreArchivoImagenConvPracEdit = $generador->generadorDeNombres().".jpg";
                    $convocatoriaControla->subirImagenConvocatoriaPracticas($rutaDeImagenConvPracEdit, $nuevoNombreArchivoImagenConvPracEdit, $imagenEditDeConvPracticas, $nombreDeConvocatoriaPracticasAEdit);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la convocatoria comite
                if(strlen($enunciadoEditDeConvPracticas) >= 1){
                    
                    $rutaDeEnunciadoConvPracEdit = $_FILES['archivoInfoDeConvocatoriaExtEdit']['tmp_name'];

                    //Consultamos si la convocatoria ya tiene un enunciado previo en servidor
                    $nombreAntiguoEnunciadoConvPracEdit = $convocatoriaControla->consultarNombreEnunciadoConvocatoriaPracticas($idDeConvPracticasActualizar);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciadoConvPracEdit != null){
                        $convocatoriaControla->eliminarEnunciado($nombreAntiguoEnunciadoConvPracEdit);
                    }

                    $nuevoNombreArchivoEnunciadoConvPracEdit = $generador->generadorDeNombres().".pdf";
                    $convocatoriaControla->subirEnunciadoConvocatoriaComite($rutaDeEnunciadoConvPracEdit, $nuevoNombreArchivoEnunciadoConvPracEdit, $enunciadoEditDeConvPracticas, $nombreDeConvocatoriaPracticasAEdit);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Convocatoria actualizada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Convocatoria</h3>  
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

    //Capturamos el evento del boton de eliminacion de convocatorias comite
    if(isset($_POST['eliminarConvComite'])){

        $idConvocatoriaComiteAEliminar = trim($_POST['Id']);
        $convocatoriaControla->eliminarConvocatoriaComite($idConvocatoriaComiteAEliminar);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }

    //Capturamos el evento del boton de eliminacion de convocatorias practicas
    if(isset($_POST['eliminarConvPracticas'])){

        $idConvocatoriaPracticasAEliminar = trim($_POST['Id']);
        $convocatoriaControla->eliminarConvocatoriaPracticas($idConvocatoriaPracticasAEliminar);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }

?>