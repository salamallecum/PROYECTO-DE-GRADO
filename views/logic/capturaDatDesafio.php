<?php

    require_once "utils/Conexion.php";
    require_once "controllers/DesafioControlador.php";
    require_once "controllers/CompetenciaControlador.php";
    require_once "model/Desafio.php";
    require_once "model/DesafioPersonalizado.php";
    require_once "utils/generadorDeNombres.php";

    //Creamos el objeto controlador que invocará los metodos CRUD
    $desafioControla = new DesafioControlador();
    $competenciaControla = new CompetenciaControlador();
    $generador = new generadorNombres();

    //-------------------------------------------------------DESAFIOS----------------------------------------------------------------------

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
            $nuevoDesafio = new Desafio(0, $idDelProfesor, $nombreDeDesafio, $descripcionDesafio, $fechaInicioDesafio, $fechaFinDesafio, $cmbAsignaturaContribucion, 'Inactivo');

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

            
            if($desafioControla->actualizarDesafio($idDesafioAEditar, $idDelProfesorEdit, $nombreEditDeDesafio, $descripcionEditDesafio, $fechaEditInicioDesafio, $fechaEditFinDesafio, $editMateriaContribucion) == 1){

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
                    $nombreAntiguoEnunciado = $desafioControla->consultarNombreEnunciadoDesafio($idDesafioAEditar);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciado != null){
                        //Eliminamos el nombre del enunciado en base de datos 
                       $desafioControla->limpiarNombreEnunciadoDesafio($idDesafioAEditar, $nombreAntiguoEnunciado);
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

//-------------------------------------------------------DESAFIOS PERSONALIZADOS(Propuesta)---------------------------------------------------------------------

    //Capturamos el evento del boton de registro de desafio personalizado
    if(isset($_POST['guardarPropuesta'])){

        //Capturamos los datos de los campos del formulario
        $idDelEstudiante = trim($_POST['idEst']);
        $nombreDePropuesta = trim($_POST['nombrePropuesta']);
        $descripcionPropuesta = trim($_POST['descripcionPropuesta']);
        $fechaDePropuesta = date('Y-m-d');
        $cmbDesafioASustituir = $_REQUEST['cmbDesafios'];

        
       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDePropuesta) >= 1 && 
        strlen($descripcionPropuesta) >= 1 && 
        $cmbDesafioASustituir != 'seleccione'){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Desafio
            $nuevaPropuesta = new DesafioPersonalizado(0, $idDelEstudiante, $nombreDePropuesta, $descripcionPropuesta, $fechaDePropuesta, $cmbDesafioASustituir, 'Entregada');

            if($desafioControla->insertarPropuesta($nuevaPropuesta) == 1){
                
                $imagenDePropuesta = $_FILES['imgParaPropuesta']['name'];
                $enunciadoDePropuesta = $_FILES['archivoInfoDePropuesta']['name'];

                //Verificamos si el usuario ha subido una imagen para la propuesta
                if(strlen($imagenDePropuesta) >= 1){
                    
                    $rutaDeImagenPropuesta = $_FILES['imgParaPropuesta']['tmp_name'];
                    $nuevoNombreArchivoImagenPropuesta = $generador->generadorDeNombres().".jpg";
                    $desafioControla->subirImagenPropuesta($rutaDeImagenPropuesta, $nuevoNombreArchivoImagenPropuesta, $imagenDePropuesta, $nombreDePropuesta);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado de la propuesta
                if(strlen($enunciadoDePropuesta) >= 1){
                    
                    $rutaDeEnunciadoPropuesta = $_FILES['archivoInfoDePropuesta']['tmp_name'];
                    $nuevoNombreArchivoEnunciadoPropuesta = $generador->generadorDeNombres().".pdf";
                    $desafioControla->subirEnunciadoPropuesta($rutaDeEnunciadoPropuesta, $nuevoNombreArchivoEnunciadoPropuesta, $enunciadoDePropuesta, $nombreDePropuesta);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Propuesta registrada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Propuesta</h3>  
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
    if(isset($_POST['actualizarPropuesta'])){

        //Capturamos los datos de los campos del formulario
        $idDelEstudianteEdit = trim($_POST['idEstEdit']);
        $idPropuestaAEditar = trim($_POST['Id']);
        $nombreDePropuestaAEdit = trim($_POST['nombre_desafioP']);
        $descripcionPropuestaEdit = trim($_POST['descripcion']);
        $cmbDesafioASustituirAEditar = $_REQUEST['idDesafioASustituir'];
  
       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDePropuestaAEdit) >= 1 && 
        strlen($descripcionPropuestaEdit) >= 1 && 
        $cmbDesafioASustituirAEditar != 'seleccione'){ 

            if($desafioControla->actualizarPropuesta($idPropuestaAEditar, $idDelEstudianteEdit, $nombreDePropuestaAEdit, $descripcionPropuestaEdit, $cmbDesafioASustituirAEditar) == 1){

                $imagenEditDePropuesta = $_FILES['imgParaPropuesta']['name'];
                $enunciadoEditDePropuesta = $_FILES['archivoInfoDePropuesta']['name'];

                //Verificamos si el usuario ha subido una imagen para el desafio personalizado
                if(strlen($imagenEditDePropuesta) >= 1){
                    
                    $rutaDeImagenPropuestaEdit = $_FILES['imgParaPropuesta']['tmp_name'];

                    //Consultamos si el desafio ya tiene una imagen previa en servidor
                    $nombreAntiguaImagenPropuesta = $desafioControla->consultarNombreImagenPropuesta($idPropuestaAEditar);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagenPropuesta != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $desafioControla->limpiarNombreImagenPropuesta($idPropuestaAEditar, $nombreAntiguaImagenPropuesta);
                       //Eliminamos la imagen previa en servidor del desafio personalizado
                       $desafioControla->eliminarImagenPropuesta($nombreAntiguaImagenPropuesta);

                       $nuevoNombreArchivoImagenPropuestaEdit = $generador->generadorDeNombres().".jpg";
                       $desafioControla->subirImagenPropuesta($rutaDeImagenPropuestaEdit, $nuevoNombreArchivoImagenPropuestaEdit, $imagenEditDePropuesta, $nombreDePropuestaAEdit);

                    }
        
                    $nuevoNombreArchivoImagenPropuestaEditado = $generador->generadorDeNombres().".jpg";
                    $desafioControla->subirImagenPropuesta($rutaDeImagenPropuestaEdit, $nuevoNombreArchivoImagenPropuestaEditado, $imagenEditDePropuesta, $nombreDePropuestaAEdit);
                    
                }
                
                //Verificamos si el usuario ha subido un archivo con el enunciado del desafio personalizado
                if(strlen($enunciadoEditDePropuesta) >= 1){
                    
                    $rutaDeEnunciadoPropuestaEdit = $_FILES['archivoInfoDePropuesta']['tmp_name'];

                    //Consultamos si el desafio ya tiene un enunciado previo en servidor
                    $nombreAntiguoEnunciadoPropuesta = $desafioControla->consultarNombreEnunciadoPropuesta($idPropuestaAEditar);

                    //Eliminamos el enunciado previo en servidor
                    if($nombreAntiguoEnunciadoPropuesta != null){
                        //Eliminamos el nombre del enunciado en base de datos 
                       $desafioControla->limpiarNombreEnunciadoPropuesta($idPropuestaAEditar, $nombreAntiguoEnunciadoPropuesta);
                       //Eliminamos enunciado previo en servidor del desafio personalizado
                       $desafioControla->eliminarEnunciadoPropuesta($nombreAntiguoEnunciadoPropuesta);

                       $nuevoNombreArchivoEnunciadoPropuestaEdit = $generador->generadorDeNombres().".pdf";
                       $desafioControla->subirEnunciadoPropuesta($rutaDeEnunciadoPropuestaEdit, $nuevoNombreArchivoEnunciadoPropuestaEdit, $enunciadoEditDePropuesta, $nombreDePropuestaAEdit);
                    }
                    
                    $nuevoNombreArchivoEnunciadoPropuestaEditado = $generador->generadorDeNombres().".pdf";
                    $desafioControla->subirEnunciadoPropuesta($rutaDeEnunciadoPropuestaEdit, $nuevoNombreArchivoEnunciadoPropuestaEditado, $enunciadoEditDePropuesta, $nombreDePropuestaAEdit);
                
                }
                
                ?>
                <h3 class="indicadorSatisfactorio">* Propuesta actualizado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Propuesta</h3>  
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

    //Capturamos el evento del boton de eliminacion de desafios personalizados
    if(isset($_POST['eliminarPropuesta'])){

        $idPropuestaAEliminar = trim($_POST['Id']);
        $desafioControla->eliminarPropuesta($idPropuestaAEliminar);

        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }

?>