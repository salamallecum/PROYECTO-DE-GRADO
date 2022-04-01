<?php

    require_once "utils/Conexion.php";
    require_once "controllers/DesafioControlador.php";
    require_once "controllers/CompetenciaControlador.php";
    require_once "model/Desafio.php";
    require_once "utils/generadorDeNombres.php";

    //Creamos el objeto controlador que invocará los metodos CRUD
    $desafioControla = new DesafioControlador();
    $competenciaControla = new CompetenciaControlador();
    $generador = new generadorNombres();

    //Capturamos el evento del boton de registro de desafio
    if(isset($_POST['guardarDesafio'])){

        //Capturamos los datos de los campos del formulario
        $idDelProfesor = trim($_POST['idProf']);
        $nombreDeDesafio = trim($_POST['nombreDesafio']);
        $descripcionDesafio = trim($_POST['descripcionDesafio']);
        $fechaInicioDesafio = date('Y-m-d', strtotime($_POST['dateFechaInicioDesafio']));
        $fechaFinDesafio = date('Y-m-d', strtotime($_POST['dateFechaFinDesafio']));
        $cmbAsignaturaContribucion = $_REQUEST['cmbAsignaturas'];
        

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeDesafio) >= 1 && 
        strlen($descripcionDesafio) >= 1 && 
        $fechaInicioDesafio != '1970-01-01' &&
        $fechaFinDesafio != '1970-01-01' &&
        $cmbAsignaturaContribucion != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Desafio
            $nuevoDesafio = new Desafio(0, $idDelProfesor, $nombreDeDesafio, $descripcionDesafio, $fechaInicioDesafio, $fechaFinDesafio, $cmbAsignaturaContribucion);

            if($desafioControla->insertarDesafio($nuevoDesafio) == 1){
                
                $imagenDelDesafio = $_FILES['imgParaElDesafio']['name'];
                $enunciadoDelDesafio = $_FILES['archivoInfoDelDesafio']['name'];

                //Verificamos si el usuario ha subido una imagen para el desafio
                if(strlen($imagenDelDesafio) >= 1){
                    
                    $rutaDeImagen = $_FILES['imgParaElDesafio']['tmp_name'];
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $desafioControla->subirImagenDesafio($rutaDeImagen, $nuevoNombreArchivoImagen, $imagenDelDesafio, $nombreDeDesafio);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del evento
                if(strlen($enunciadoDelDesafio) >= 1){
                    
                    $rutaDeEnunciado = $_FILES['archivoInfoDelDesafio']['tmp_name'];
                    $nuevoNombreArchivoEnunciado = $generador->generadorDeNombres().".pdf";
                    $desafioControla->subirEnunciadoDesafio($rutaDeEnunciado, $nuevoNombreArchivoEnunciado, $enunciadoDelDesafio, $nombreDeDesafio);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Desafio registrado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Desafio</h3>  
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

    //Capturamos el evento del boton de actualizacion de Desafios
    if(isset($_POST['actualizarDesafio'])){

        //Capturamos los datos de los campos del formulario
        $idDelProfesorEdit = trim($_POST['id_profEdit']);
        $idDesafioAEditar = trim($_POST['id_desafio']);
        $nombreEditDeDesafio = trim($_POST['nombre_desafio']);
        $descripcionEditDesafio = trim($_POST['descripcion_desafio']);
        $fechaEditInicioDesafio = trim($_POST['fecha_inicio']);
        $fechaEditFinDesafio = trim($_POST['fecha_fin']);
        $editMateriaContribucion = trim($_POST['id_asignatura']);
  
       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreEditDeDesafio) >= 1 && 
        strlen($descripcionEditDesafio) >= 1 && 
        strlen($fechaEditInicioDesafio) >= 1 &&
        strlen($fechaEditFinDesafio) >= 1 &&
        $editMateriaContribucion != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Desafio
            $desafioActualizado = new Desafio($idDesafioAEditar, $idDelProfesorEdit, $nombreEditDeDesafio, $descripcionEditDesafio, $fechaEditInicioDesafio, $fechaEditFinDesafio, $editMateriaContribucion);

            if($desafioControla->actualizarDesafio($desafioActualizado) == 1){

                $imagenEditDelDesafio = $_FILES['imagenActualizada']['name'];
                $enunciadoEditDelDesafio = $_FILES['enunciadoActualizado']['name'];

                //Verificamos si el usuario ha subido una imagen para el desafio
                if(strlen($imagenEditDelDesafio) >= 1){
                    
                    $rutaDeImagenEdit = $_FILES['imagenActualizada']['tmp_name'];

                    //Consultamos si el desafio ya tiene una imagen previa en servidor
                    $nombreAntiguaImagen = $desafioControla->consultarNombreImagenDesafio($idDesafioAEditar);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagen != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $desafioControla->limpiarNombreImagenDesafio($idEventoAEditar, $nombreAntiguaImagen);
                       //Eliminamos la imagen previa en servidor del desafio
                       $desafioControla->eliminarImagen($nombreAntiguaImagen);

                       $nuevoNombreArchivoImagenDesafioEdit = $generador->generadorDeNombres().".jpg";
                       $desafioControla->subirImagenDesafio($rutaDeImagenEdit, $nuevoNombreArchivoImagenDesafioEdit, $imagenEditDelDesafio, $nombreEditDeDesafio);

                    }
        
                    $nuevoNombreArchivoImagenDesafioEditado = $generador->generadorDeNombres().".jpg";
                    $desafioControla->subirImagenDesafio($rutaDeImagenEdit, $nuevoNombreArchivoImagenDesafioEditado, $imagenEditDelDesafio, $nombreEditDeDesafio);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del desafio
                if(strlen($enunciadoEditDelDesafio) >= 1){
                    
                    $rutaDeEnunciadoEdit = $_FILES['enunciadoActualizado']['tmp_name'];

                    //Consultamos si el desafio ya tiene un enunciado previo en servidor
                    $nombreAntiguoEnunciado = $desafioControla->consultarNombreEnunciadoDesafio($idEventoAEditar);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciado != null){
                        //Eliminamos el nombre del enunciado en base de datos 
                       $desafioControla->limpiarNombreEnunciadoDesafio($idEventoAEditar, $nombreAntiguoEnunciado);
                       //Eliminamos enunciado previo en servidor del desafio
                       $desafioControla->eliminarEnunciado($nombreAntiguoEnunciado);

                       $nuevoNombreArchivoEnunciadoDesafioEdit = $generador->generadorDeNombres().".pdf";
                       $desafioControla->subirEnunciadoDesafio($rutaDeEnunciadoEdit, $nuevoNombreArchivoEnunciadoDesafioEdit, $enunciadoEditDelDesafio, $nombreEditDeDesafio);
                    }
                    
                    $nuevoNombreArchivoEnunciadoDesafioEditado = $generador->generadorDeNombres().".pdf";
                    $desafioControla->subirEnunciadoDesafio($rutaDeEnunciadoEdit, $nuevoNombreArchivoEnunciadoDesafioEditado, $enunciadoEditDelDesafio, $nombreEditDeDesafio);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Desafio actualizado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Desafio</h3>  
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

    //Capturamos el evento del boton de eliminacion de desafios
    if(isset($_POST['eliminarDesafio'])){

        $idDesafioAEliminar = trim($_POST['id_desafio']);
        $desafioControla->eliminarDesafio($idDesafioAEliminar);

        $elDesafioTieneRegCGPrevio = $competenciaControla->verificarSiElDesafioTieneRegistroDeCompGenerales($idDesafioAEliminar);

        $elDesafioTieneRegCEPrevio = $competenciaControla->verificarSiElDesafioTieneRegistroDeCompEspecificas($idDesafioAEliminar);

        if($elDesafioTieneRegCGPrevio){
            $competenciaControla->eliminarAsignacionDeCompetenciasGenerales($idDesafioAEliminar, 'DESAFIO');
        }

        if($elDesafioTieneRegCEPrevio){
            $competenciaControla->eliminarAsignacionDeCompetenciasEspecificas($idDesafioAEliminar, 'DESAFIO');
        }

        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }

?>