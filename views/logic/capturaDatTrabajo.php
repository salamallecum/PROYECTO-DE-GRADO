<?php

    require_once "utils/Conexion.php";
    require_once "controllers/TrabajoControlador.php";
    require_once "model/TrabajoDestacado.php";
    require_once "utils/generadorDeNombres.php";

    //Creamos el objeto controlador que invocará los metodos CRUD
    $trabajoDestControla = new TrabajoControlador();
    $generador = new generadorNombres();

    //Capturamos el evento del boton de registro de trabajos destacados
    if(isset($_POST['guardarTrabajoDestacado'])){

        //Capturamos los datos de los campos del formulario
        $idDelEstudianteLogueado = trim($_POST['idEst']);
        $nombreDeTrabajo = trim($_POST['nombreTrabajo']);
        $descripcionTrabajo = trim($_POST['descripcionTrabajo']);    

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeTrabajo) >= 1 && 
        strlen($descripcionTrabajo) >= 1 ){
            
            //Validamos si el check de publicacion en el eportafolio esta activo
            if(isset($_REQUEST['publicarEnEportafolio'])){
                $sePublicaTrabajo = "Si";
            }else{
                $sePublicaTrabajo = "No";
            }

            //Encapsulamos los datos obtenidos en un objeto de tipo Trabajo destacado
            $nuevoTrabajo = new TrabajoDestacado(0, $idDelEstudianteLogueado, $nombreDeTrabajo, $descripcionTrabajo, 'No', 'No', $sePublicaTrabajo);

            if($trabajoDestControla->insertarTrabajodestacado($nuevoTrabajo) == 1){
                
                $imagenDelTrabajo = $_FILES['imgParaElTrabajo']['name'];

                //Capturamos los datos de los links de evidencia
                $linkEvidenciaDocumento = trim($_POST['linkDocumento']);
                $linkEvidenciaVideo = trim($_POST['linkVideo']);
                $linkEvidenciaRepoCodigo = trim($_POST['linkRepoCodigo']);
                $linkEvidenciaPresentacion = trim($_POST['linkPresentacion']);

                
                //Verificamos si el usuario ha subido una imagen para el trabajo destacado
                if(strlen($imagenDelTrabajo) >= 1){
                    
                    $rutaDeImagen = $_FILES['imgParaElTrabajo']['tmp_name'];
                    $nuevoNombreArchivoImagen = $generador->generadorDeNombres().".jpg";
                    $trabajoDestControla->subirImagenTrabajo($rutaDeImagen, $nuevoNombreArchivoImagen, $imagenDelTrabajo, $nombreDeTrabajo);
                    
                }

                //Verificamos si el usuario suministró algun link de evidencia para el trabajo destacado creado
                if(strlen($linkEvidenciaDocumento) >= 1){

                    $trabajoDestControla->actualizarLinkDocumentoTrabDestacado($linkEvidenciaDocumento, $nombreDeTrabajo);
                }

                if(strlen($linkEvidenciaVideo) >= 1){
                    $trabajoDestControla->actualizarLinkVideoTrabDestacado($linkEvidenciaVideo, $nombreDeTrabajo);
                }

                if(strlen($linkEvidenciaRepoCodigo) >= 1){
                    $trabajoDestControla->actualizarLinkRepoCodigoTrabDestacado($linkEvidenciaRepoCodigo, $nombreDeTrabajo);
                }

                if(strlen($linkEvidenciaPresentacion) >= 1){
                    $trabajoDestControla->actualizarLinkPresentacionTrabDestacado($linkEvidenciaPresentacion, $nombreDeTrabajo);
                }
                
                
                ?>
                <h3 class="indicadorSatisfactorio">* Trabajo destacado registrado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Trabajo destacado</h3>  
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


    //Capturamos el evento del boton de actualizacion de trabajos destacados
    if(isset($_POST['actualizarTrabajoDestacado'])){

        //Capturamos los datos de los campos del formulario
        $idDelTrabajoDestacadoEdit= trim($_POST['Id']);
        $nombreDeTrabajoEdit = trim($_POST['nombre_trabajo']);
        $descripcionTrabajoEdit = trim($_POST['descripcion']);  

       //Validamos que los campos no se encuentren vacios
        if(strlen($nombreDeTrabajoEdit) >= 1 && 
        strlen($descripcionTrabajoEdit) >= 1 ){
            
            //Validamos si el check de publicacion en el eportafolio esta activo
            if(isset($_REQUEST['publicadoeneportafolioEdit'])){
                $sePublicaTrabajoEdit = "Si";
            }else{
                $sePublicaTrabajoEdit = "No";
            }

            if($trabajoDestControla->actualizarTrabajoDestacado($idDelTrabajoDestacadoEdit, $nombreDeTrabajoEdit, $descripcionTrabajoEdit, $sePublicaTrabajoEdit) == 1){
                
                $imagenDelTrabajoEdit = $_FILES['imgParaElTrabajoEdit']['name'];

                //Capturamos los datos de los links de evidencia
                $linkEvidenciaDocumentoEdit = trim($_POST['link_documento']);
                $linkEvidenciaVideoEdit = trim($_POST['link_video']);
                $linkEvidenciaRepoCodigoEdit = trim($_POST['link_repocodigo']);
                $linkEvidenciaPresentacionEdit = trim($_POST['link_presentacion']);

                
                //Verificamos si el usuario ha subido una imagen para el trabajo destacado
                if(strlen($imagenDelTrabajoEdit) >= 1){
                    
                    $rutaDeImagenEdit = $_FILES['imgParaElTrabajoEdit']['tmp_name'];

                    //Consultamos si el trabajo destacado ya tiene una imagen previa en servidor
                    $nombreAntiguaImagen = $trabajoDestControla->consultarNombreImagenTrabajoDestacado($idDelTrabajoDestacadoEdit);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagen != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $trabajoDestControla->limpiarNombreImagenTrabajoDestacado($idDelTrabajoDestacadoEdit, $nombreAntiguaImagen);
                       //Eliminamos la imagen previa en servidor del trabajo destacado
                       $trabajoDestControla->eliminarImagen($nombreAntiguaImagen);

                       $nuevoNombreArchivoImagenTrabajoEdit = $generador->generadorDeNombres().".jpg";
                       $trabajoDestControla->subirImagenTrabajo($rutaDeImagenEdit, $nuevoNombreArchivoImagenTrabajoEdit, $imagenDelTrabajoEdit, $nombreDeTrabajoEdit);

                    }
        
                    $nuevoNombreArchivoImagenTrabajoEditado = $generador->generadorDeNombres().".jpg";
                    $trabajoDestControla->subirImagenTrabajo($rutaDeImagenEdit, $nuevoNombreArchivoImagenTrabajoEditado, $imagenDelTrabajoEdit, $nombreDeTrabajoEdit);
                    
                }

                //Verificamos si el usuario suministró algun link de evidencia para el trabajo destacado creado
                if(strlen($linkEvidenciaDocumentoEdit) >= 1){
                    $trabajoDestControla->actualizarLinkDocumentoTrabDestacado($linkEvidenciaDocumentoEdit, $nombreDeTrabajoEdit);
                }else{
                    $trabajoDestControla->limpiarLinkDocumentoTrabDestacado($idDelTrabajoDestacadoEdit);
                }

                if(strlen($linkEvidenciaVideoEdit) >= 1){
                    $trabajoDestControla->actualizarLinkVideoTrabDestacado($linkEvidenciaVideoEdit, $nombreDeTrabajoEdit);
                }else{
                    $trabajoDestControla->limpiarLinkVideoTrabDestacado($idDelTrabajoDestacadoEdit);
                }

                if(strlen($linkEvidenciaRepoCodigoEdit) >= 1){
                    $trabajoDestControla->actualizarLinkRepoCodigoTrabDestacado($linkEvidenciaRepoCodigoEdit, $nombreDeTrabajoEdit);
                }else{
                    $trabajoDestControla->limpiarLinkRepoCodigoTrabDestacado($idDelTrabajoDestacadoEdit);
                }

                if(strlen($linkEvidenciaPresentacionEdit) >= 1){
                    $trabajoDestControla->actualizarLinkPresentacionTrabDestacado($linkEvidenciaPresentacionEdit, $nombreDeTrabajoEdit);
                }else{
                    $trabajoDestControla->limpiarLinkPresentacionTrabDestacado($idDelTrabajoDestacadoEdit);
                }
                
                
                ?>
                <h3 class="indicadorSatisfactorio">* Trabajo destacado actualizado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Trabajo destacado</h3>  
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
    
    //Capturamos el evento del boton de eliminacion de trabajos destacados
    if(isset($_POST['eliminarTrabajo'])){

        $idTrabajoAEliminar = trim($_POST['Id']);

        $elTrabajoTieneBadges = $trabajoDestControla->verificarSiElTrabajoDestacadoHaGanadoBadges($idTrabajoAEliminar);

        if($elTrabajoTieneBadges != null){

            $trabajoDestControla->eliminarTrabajoDestacado($idTrabajoAEliminar);
            $trabajoDestControla->eliminarAplicacionesDelTrabajo($idTrabajoAEliminar);
    
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }


    //Capturamos el evento del boton de aplicacion de los trabajos destacados a propuestas
    if(isset($_POST['aplicarAUnaPropuesta'])){

        //Capturamos los datos de los campos del formulario
        $idDeLaPropuesta= trim($_POST['Id']);
        $idDelEstudianteQueAplicaPropuesta= trim($_POST['idEstudiante']);
        $cmbTrabajoAAplicarPropuesta = $_REQUEST['cmbTrabajos'];
        $fechaDeAplicacionAPropuesta = date('Y-m-d');  
 
        //Validamos que los campos no se encuentren vacios
        if($cmbTrabajoAAplicarPropuesta != 'seleccione'){

            if($trabajoDestControla->aplicarTrabajoDestacado(0, $idDelEstudianteQueAplicaPropuesta, $cmbTrabajoAAplicarPropuesta, $idDeLaPropuesta,'DESAF PERSONAL', $fechaDeAplicacionAPropuesta) == 1){

                //Le quitamos la disponibilidad al trabajo destacado postulado, paraque no se pueda volver a aplicar
                $trabajoDestControla->quitarDisponibilidadATrabajoDestacado($cmbTrabajoAAplicarPropuesta);

                ?>
                <h3 class="indicadorSatisfactorio">* Trabajo aplicado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    //Capturamos el evento del boton de aplicacion de los trabajos destacados a desafios
    if(isset($_POST['aplicarAUnDesafio'])){

        //Capturamos los datos de los campos del formulario
        $idDelDesafio= trim($_POST['id_desafio']);
        $idDelEstudianteQueAplicaDesafio= trim($_POST['idEstudiante']);
        $cmbTrabajoAAplicarDesafio = $_REQUEST['cmbTrabajos'];
        $fechaDeAplicacionADesafio = date('Y-m-d');  
 
        //Validamos que los campos no se encuentren vacios
        if($cmbTrabajoAAplicarDesafio != 'seleccione'){

            if($trabajoDestControla->aplicarTrabajoDestacado(0, $idDelEstudianteQueAplicaDesafio, $cmbTrabajoAAplicarDesafio, $idDelDesafio,'DESAFIO', $fechaDeAplicacionADesafio) == 1){

                //Le quitamos la disponibilidad al trabajo destacado postulado, paraque no se pueda volver a aplicar
                $trabajoDestControla->quitarDisponibilidadATrabajoDestacado($cmbTrabajoAAplicarDesafio);

                ?>
                <h3 class="indicadorSatisfactorio">* Trabajo aplicado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    //Capturamos el evento del boton de aplicacion de los trabajos destacados a eventos
    if(isset($_POST['aplicarAUnEvento'])){

        //Capturamos los datos de los campos del formulario
        $idDelEvento= trim($_POST['id_evento']);
        $idDelEstudianteQueAplicaEvento= trim($_POST['idEstudiante']);
        $cmbTrabajoAAplicarEvento = $_REQUEST['cmbTrabajos'];
        $fechaDeAplicacionAEvento = date('Y-m-d');  
 
        //Validamos que los campos no se encuentren vacios
        if($cmbTrabajoAAplicarEvento != 'seleccione'){

            if($trabajoDestControla->aplicarTrabajoDestacado(0, $idDelEstudianteQueAplicaEvento, $cmbTrabajoAAplicarEvento, $idDelEvento,'EVENTO', $fechaDeAplicacionAEvento) == 1){

                //Le quitamos la disponibilidad al trabajo destacado postulado, paraque no se pueda volver a aplicar
                $trabajoDestControla->quitarDisponibilidadATrabajoDestacado($cmbTrabajoAAplicarEvento);

                ?>
                <h3 class="indicadorSatisfactorio">* Trabajo aplicado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    //Capturamos el evento del boton de aplicacion de los trabajos destacados a convocatorias
    if(isset($_POST['aplicarAUnaConvocatoria'])){

        //Capturamos los datos de los campos del formulario
        $idDeConvocatoria= trim($_POST['Id']);
        $idDelEstudianteQueAplicaConvocatoria= trim($_POST['idEstudiante']);
        $cmbTrabajoAAplicarConvocatoria = $_REQUEST['cmbTrabajos'];
        $fechaDeAplicacionAConvocatoria = date('Y-m-d');  
 
        //Validamos que los campos no se encuentren vacios
        if($cmbTrabajoAAplicarConvocatoria != 'seleccione'){

            if($trabajoDestControla->aplicarTrabajoDestacado(0, $idDelEstudianteQueAplicaConvocatoria, $cmbTrabajoAAplicarConvocatoria, $idDeConvocatoria,'CONVOCATORIA', $fechaDeAplicacionAConvocatoria) == 1){

                //Le quitamos la disponibilidad al trabajo destacado postulado, paraque no se pueda volver a aplicar
                $trabajoDestControla->quitarDisponibilidadATrabajoDestacado($cmbTrabajoAAplicarConvocatoria);

                ?>
                <h3 class="indicadorSatisfactorio">* Trabajo aplicado satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

?>