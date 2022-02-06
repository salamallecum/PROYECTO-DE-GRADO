<?php

    require_once "utils/Conexion.php";
    require_once "controllers/EventoControlador.php";
    require_once "model/Evento.php";
    require_once "utils/generadorDeNombres.php";

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

            //Creamos el objeto controlador que invocará los metodos CRUD
            $eventoControla = new EventoControlador();

            if($eventoControla->insertarEvento($nuevoEvento) == 1){

                
                $imagenDelEvento = $_FILES['imgParaElEvento']['name'];
                $enunciadoDelEvento = $_FILES['archivoInfoDelEvento']['name'];

                //Verificamos si el usuario ha subido una imagen para el evento
                if(strlen($imagenDelEvento) >= 1){
                    
                    $rutaDeImagen = $_FILES['imgParaElEvento']['tmp_name'];
                    $generador = new generadorNombres();
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $eventoControla->subirImagenEvento($rutaDeImagen, $nuevoNombreArchivoImagen, $imagenDelEvento, $nombreDeEvento);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del evento
                if(strlen($enunciadoDelEvento) >= 1){
                    
                    $rutaDeEnunciado = $_FILES['archivoInfoDelEvento']['tmp_name'];
                    $generador = new generadorNombres();
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

    //Capturamos el evento del boton de actualizacion de evento
    if(isset($_POST['actualizarEvento'])){

        //Capturamos los datos de los campos del formulario
        $nombreEditDeEvento = trim($_POST['nombreEventoEditado']);
        $descripcionEditEvento = trim($_POST['descripcionActualizada']);
        $fechaEditInicioEvento = date('Y-m-d', strtotime($_POST['dateFechaInicioActualizada']));
        $fechaEditFinEvento = date('Y-m-d', strtotime($_POST['dateFechaFinActualizada']));
        $cmbEditProfesorEncargado = $_REQUEST['cmbProfesoresRespEdit'];
        //$cmbCompetencias = $_POST['competencias'];

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreEditDeEvento) >= 1 && 
        strlen($descripcionEditEvento) >= 1 && 
        $fechaEditInicioEvento != '1970-01-01' &&
        $fechaEditFinEvento != '1970-01-01' &&
        $cmbEditProfesorEncargado != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Evento
            $eventoActualizado = new Evento(0, $nombreEditDeEvento, $descripcionEditEvento, $fechaEditInicioEvento, $fechaEditFinEvento, $cmbEditProfesorEncargado);

            //Creamos el objeto controlador que invocará los metodos CRUD
            $eventoControla = new EventoControlador();

            if($eventoControla->actualizarEvento($eventoActualizado) == 1){

                
                $imagenEditDelEvento = $_FILES['imgParaElEvento']['name'];
                $enunciadoEditDelEvento = $_FILES['archivoInfoDelEvento']['name'];

                //Verificamos si el usuario ha subido una imagen para el evento
                if(strlen($imagenEditDelEvento) >= 1){
                    
                    $rutaDeImagen = $_FILES['imgParaElEvento']['tmp_name'];

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguaImagen = $eventoControla->consultarNombreImagenEvento($nombreEditDeEvento);

                    //Eliminamoslaimagen previa en servidor
                    if($nombreAntiguaImagen != null){
                        $eventoControla->eliminarImagen($nombreAntiguaImagen);
                    }

                    $generador = new generadorNombres();
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $eventoControla->subirImagenEvento($rutaDeImagen, $nuevoNombreArchivoImagen, $imagenEditDelEvento, $nombreEditDeEvento);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del evento
                if(strlen($enunciadoEditDelEvento) >= 1){
                    
                    $rutaDeEnunciado = $_FILES['archivoInfoDelEvento']['tmp_name'];

                    //Consultamos si el evento ya tiene un enunciado previo en servidor
                    $nombreAntiguoEnunciado = $eventoControla->consultarNombreEnunciadoEvento($nombreEditDeEvento);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciado != null){
                        $eventoControla->eliminarEnunciado($nombreAntiguoEnunciado);
                    }

                    $generador = new generadorNombres();
                    $nuevoNombreArchivoEnunciado = $generador->generadorDeNombres().".pdf";
                    $eventoControla->subirEnunciadoEvento($rutaDeEnunciado, $nuevoNombreArchivoEnunciado, $enunciadoEditDelEvento, $nombreEditDeEvento);
                
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
    
?>