<?php

    require_once "utils/Conexion.php";
    require_once "controllers/EventoControlador.php";
    require_once "controllers/CompetenciaControlador.php";
    require_once "model/Evento.php";
    require_once "utils/generadorDeNombres.php";

    //Creamos el objeto controlador que invocará los metodos CRUD
    $eventoControla = new EventoControlador();
    $competenciaControla = new CompetenciaControlador();
    $generador = new generadorNombres();

    //Capturamos el evento del boton de registro de evento
    if(isset($_POST['guardarEvento'])){

        //Capturamos los datos de los campos del formulario
        $nombreDeEvento = trim($_POST['nombreEvento']);
        $descripcionEvento = trim($_POST['descripcionEvento']);
        $fechaInicioEvento = date('Y-m-d', strtotime($_POST['dateFechaInicioEvento']));
        $fechaFinEvento = date('Y-m-d', strtotime($_POST['dateFechaFinEvento']));
        $cmbProfesorEncargado = $_REQUEST['cmbProfesor'];
        

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeEvento) >= 1 && 
        strlen($descripcionEvento) >= 1 && 
        $fechaInicioEvento != '1970-01-01' &&
        $fechaFinEvento != '1970-01-01' &&
        $cmbProfesorEncargado != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Evento
            $nuevoEvento = new Evento(0, $nombreDeEvento, $descripcionEvento, $fechaInicioEvento, $fechaFinEvento, $cmbProfesorEncargado);

            if($eventoControla->insertarEvento($nuevoEvento) == 1){
                
                $imagenDelEvento = $_FILES['imgParaElEvento']['name'];
                $enunciadoDelEvento = $_FILES['archivoInfoDelEvento']['name'];

                //Verificamos si el usuario ha subido una imagen para el evento
                if(strlen($imagenDelEvento) >= 1){
                    
                    $rutaDeImagen = $_FILES['imgParaElEvento']['tmp_name'];
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $eventoControla->subirImagenEvento($rutaDeImagen, $nuevoNombreArchivoImagen, $imagenDelEvento, $nombreDeEvento);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del evento
                if(strlen($enunciadoDelEvento) >= 1){
                    
                    $rutaDeEnunciado = $_FILES['archivoInfoDelEvento']['tmp_name'];
                    $nuevoNombreArchivoEnunciado = $generador->generadorDeNombres().".pdf";
                    $eventoControla->subirEnunciadoEvento($rutaDeEnunciado, $nuevoNombreArchivoEnunciado, $enunciadoDelEvento, $nombreDeEvento);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Evento registrado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Evento</h3>  
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

    //Capturamos el evento del boton de actualizacion de eventos
    if(isset($_POST['actualizarEvento'])){

        //Capturamos los datos de los campos del formulario
        $idEventoAEditar = trim($_POST['id_evento']);
        $nombreEditDeEvento = trim($_POST['nombre_evento']);
        $descripcionEditEvento = trim($_POST['descripcion_evento']);
        $fechaEditInicioEvento = trim($_POST['fecha_inicio']);
        $fechaEditFinEvento = trim($_POST['fecha_fin']);
        $editProfesorEncargado = trim($_POST['id_usuario']);
  
       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreEditDeEvento) >= 1 && 
        strlen($descripcionEditEvento) >= 1 && 
        strlen($fechaEditInicioEvento) >= 1 &&
        strlen($fechaEditFinEvento) >= 1 &&
        $editProfesorEncargado != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Evento
            $eventoActualizado = new Evento($idEventoAEditar, $nombreEditDeEvento, $descripcionEditEvento, $fechaEditInicioEvento, $fechaEditFinEvento, $editProfesorEncargado);

            if($eventoControla->actualizarEvento($eventoActualizado) == 1){

                $imagenEditDelEvento = $_FILES['imagenActualizada']['name'];
                $enunciadoEditDelEvento = $_FILES['enunciadoActualizado']['name'];

                //Verificamos si el usuario ha subido una imagen para el evento
                if(strlen($imagenEditDelEvento) >= 1){
                    
                    $rutaDeImagenEdit = $_FILES['imagenActualizada']['tmp_name'];

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguaImagen = $eventoControla->consultarNombreImagenEvento($idEventoAEditar);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagen != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $eventoControla->limpiarNombreImagenEvento($nombreAntiguaImagen);
                       //Eliminamos la imagen previa en servidor del evento
                       $eventoControla->eliminarImagen($nombreAntiguaImagen);

                       $nuevoNombreArchivoImagenEventoEdit = $generador->generadorDeNombres().".jpg";
                       $eventoControla->subirImagenEvento($rutaDeImagenEdit, $nuevoNombreArchivoImagenEventoEdit, $imagenEditDelEvento, $nombreEditDeEvento);

                    }
        
                    $nuevoNombreArchivoImagenEventoEditado = $generador->generadorDeNombres().".jpg";
                    $eventoControla->subirImagenEvento($rutaDeImagenEdit, $nuevoNombreArchivoImagenEventoEditado, $imagenEditDelEvento, $nombreEditDeEvento);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del evento
                if(strlen($enunciadoEditDelEvento) >= 1){
                    
                    $rutaDeEnunciadoEdit = $_FILES['enunciadoActualizado']['tmp_name'];

                    //Consultamos si el evento ya tiene un enunciado previo en servidor
                    $nombreAntiguoEnunciado = $eventoControla->consultarNombreEnunciadoEvento($idEventoAEditar);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciado != null){
                        //Eliminamos el nombre del enunciado en base de datos 
                       $eventoControla->limpiarNombreEnunciadoEvento($nombreAntiguoEnunciado);
                       //Eliminamos enunciado previo en servidor del evento
                       $eventoControla->eliminarEnunciado($nombreAntiguoEnunciado);

                       $nuevoNombreArchivoEnunciadoEventoEdit = $generador->generadorDeNombres().".pdf";
                       $eventoControla->subirEnunciadoEvento($rutaDeEnunciadoEdit, $nuevoNombreArchivoEnunciadoEventoEdit, $enunciadoEditDelEvento, $nombreEditDeEvento);
                    }
                    
                    $nuevoNombreArchivoEnunciadoEventoEditado = $generador->generadorDeNombres().".pdf";
                    $eventoControla->subirEnunciadoEvento($rutaDeEnunciadoEdit, $nuevoNombreArchivoEnunciadoEventoEditado, $enunciadoEditDelEvento, $nombreEditDeEvento);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Evento actualizado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Evento</h3>  
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

    //Capturamos el evento del boton de eliminacion de eventos
    if(isset($_POST['eliminarEvento'])){

        $idEventoAEliminar = trim($_POST['id_evento']);
        $eventoControla->eliminarEvento($idEventoAEliminar);

        $elEventoTieneRegCGPrevio = $competenciaControla->verificarSiElEventoTieneRegistroDeCompGenerales($idEventoAEliminar);

        $elEventoTieneRegCEPrevio = $competenciaControla->verificarSiElEventoTieneRegistroDeCompEspecificas($idEventoAEliminar);

        if($elEventoTieneRegCGPrevio){
            $competenciaControla->eliminarAsignacionDeCompetenciasGenerales($idEventoAEliminar, 'EVENTO');
        }

        if($elEventoTieneRegCEPrevio){
            $competenciaControla->eliminarAsignacionDeCompetenciasEspecificas($idEventoAEliminar, 'EVENTO');
        }

        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }
    
?>