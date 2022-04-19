<?php

    require_once "utils/Conexion.php";
    require_once "controllers/CompetenciaControlador.php";
    require_once "model/CompetenciaEspecifica.php";
    require_once "model/CompetenciaGeneral.php";
    require_once "utils/generadorDeNombres.php";

    //Creamos el objeto controlador que invocará los metodos CRUD
    $competenciaControla = new CompetenciaControlador();
    $listadoCompGenerales = array();
    $generador = new generadorNombres();

    
    //Capturamos el evento del boton de registro de una nueva competencia general
    if(isset($_POST['guardarCompetenciaGeneral'])){

        //Capturamos los datos de los campos del formulario
        $cmbCodigoCompGeneral = $_REQUEST['cmbCodigosCompGenerales'];
        $cmbRolCompGeneral = $_REQUEST['cmbRolesPandora'];
        $nombreCompGeneral = trim($_POST['descripcionCompetenciaGeneral']);
        $cargaBadgeOro = $_FILES['img_insigOroCompGeneral']['name'];
        $cargaBadgePlata = $_FILES['img_insigPlataCompGeneral']['name'];
        $cargaBadgeBronce = $_FILES['img_insigBronceCompGeneral']['name'];
        $codigoSeleccionado = "";
        $rolSeleccionado = "";

       //Validamos que los campos no se encuentren vacios
       if($cmbCodigoCompGeneral != 'seleccione' && 
        $cmbRolCompGeneral != 'seleccione' && 
        strlen($nombreCompGeneral) >= 1 && 
        strlen($cargaBadgeOro) >= 1 && 
        strlen($cargaBadgePlata) >=1 &&
        strlen($cargaBadgeBronce) >=1){
       
            //Capturamos los datos del combobox de codigos de competencias generales
            if($cmbCodigoCompGeneral == 'A'){
                $codigoSeleccionado = "A";
            }else if($cmbCodigoCompGeneral == 'B'){
                $codigoSeleccionado = "B";
            }else if($cmbCodigoCompGeneral == 'C'){
                $codigoSeleccionado = "C";
            }else if($cmbCodigoCompGeneral == 'D'){
                $codigoSeleccionado = "D";
            }else if($cmbCodigoCompGeneral == 'E'){
                $codigoSeleccionado = "E";
            }else if($cmbCodigoCompGeneral == 'F'){
                $codigoSeleccionado = "F";
            }else if($cmbCodigoCompGeneral == 'G'){
                $codigoSeleccionado = "G";
            }else if($cmbCodigoCompGeneral == 'H'){
                $codigoSeleccionado = "H";
            }else if($cmbCodigoCompGeneral == 'I'){
                $codigoSeleccionado = "I";
            }else if($cmbCodigoCompGeneral == 'J'){
                $codigoSeleccionado = "J";
            }else if($cmbCodigoCompGeneral == 'K'){
                $codigoSeleccionado = "K";
            }else if($cmbCodigoCompGeneral == 'L'){
                $codigoSeleccionado = "L";
            }else if($cmbCodigoCompGeneral == 'M'){
                $codigoSeleccionado = "M";
            }else if($cmbCodigoCompGeneral == 'N'){
                $codigoSeleccionado = "N";
            }else if($cmbCodigoCompGeneral == 'Ñ'){
                $codigoSeleccionado = "Ñ";
            }else if($cmbCodigoCompGeneral == 'O'){
                $codigoSeleccionado = "O";
            }else if($cmbCodigoCompGeneral == 'P'){
                $codigoSeleccionado = "P";
            }else if($cmbCodigoCompGeneral == 'Q'){
                $codigoSeleccionado = "Q";
            }else if($cmbCodigoCompGeneral == 'R'){
                $codigoSeleccionado = "R";
            }else if($cmbCodigoCompGeneral == 'S'){
                $codigoSeleccionado = "S";
            }else if($cmbCodigoCompGeneral == 'T'){
                $codigoSeleccionado = "T";
            }else if($cmbCodigoCompGeneral == 'U'){
                $codigoSeleccionado = "U";
            }else if($cmbCodigoCompGeneral == 'V'){
                $codigoSeleccionado = "V";
            }else if($cmbCodigoCompGeneral == 'W'){
                $codigoSeleccionado = "W";
            }else if($cmbCodigoCompGeneral == 'X'){
                $codigoSeleccionado = "X";
            }else if($cmbCodigoCompGeneral == 'Y'){
                $codigoSeleccionado = "Y";
            }else if($cmbCodigoCompGeneral == 'Z'){
                $codigoSeleccionado = "Z";
            }

            //Capturamos los datos del combobox de roles pandora
            if($cmbRolCompGeneral == 'noble'){
                $rolSeleccionado = "Noble lider";
            }else if($cmbRolCompGeneral == 'virtuoso'){
                $rolSeleccionado = "Virtuoso tecnologico";
            }else if($cmbRolCompGeneral == 'maestro'){
                $rolSeleccionado = "Maestro de los procesos";
            }else if($cmbRolCompGeneral == 'explorador'){
                $rolSeleccionado = "Explorador";
            }

            //Encapsulamos los datos obtenidos en un objeto de tipo Competencia general
            $nuevaCompGeneral = new CompetenciaGeneral(0, $codigoSeleccionado, $nombreCompGeneral, $rolSeleccionado);

            if($competenciaControla->insertarCompGeneral($nuevaCompGeneral) == 1){
    
                $rutaDeBadgeOro = $_FILES['img_insigOroCompGeneral']['tmp_name'];
                $rutaDeBadgePlata = $_FILES['img_insigPlataCompGeneral']['tmp_name'];
                $rutaDeBadgeBronce = $_FILES['img_insigBronceCompGeneral']['tmp_name'];

                $nuevoNombreBadgeOro = $generador->generadorDeNombres().".jpg";
                $nuevoNombreBadgePlata = $generador->generadorDeNombres().".jpg";
                $nuevoNombreBadgeBronce = $generador->generadorDeNombres().".jpg";
            
                $competenciaControla->subirBadgeOroCompGeneral($rutaDeBadgeOro, $nuevoNombreBadgeOro, $cargaBadgeOro, $nombreCompGeneral);
                $competenciaControla->subirBadgePlataCompGeneral($rutaDeBadgePlata, $nuevoNombreBadgePlata, $cargaBadgePlata, $nombreCompGeneral);
                $competenciaControla->subirBadgeBronceCompGeneral($rutaDeBadgeBronce, $nuevoNombreBadgeBronce, $cargaBadgeBronce, $nombreCompGeneral);
                     
                ?>
                <h3 class="indicadorSatisfactorio">* Competencia general registrada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Competencia general</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
    
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
            <?php
        }
    }

    //Capturamos el evento del boton de registro de una nueva competencia especifica
    if(isset($_POST['guardarCompetenciaEspecifica'])){

        //Capturamos los datos de los campos del formulario
        $codigoCompEspecifica = trim($_POST['txtCodigoCompEspecífic']);
        $cmbRolCompEspecifica = $_REQUEST['cmbRolesPandoraEsp'];
        $nombreCompEspecifica = trim($_POST['descripcionCompetenciaEspecifica']);
        $cmbCompGeneralEscogida = $_REQUEST['cmbCompetenciasGenerales'];
        $cargaBadgeOroEsp = $_FILES['img_insigOroCompEsp']['name'];
        $cargaBadgePlataEsp = $_FILES['img_insigPlataCompEsp']['name'];
        $cargaBadgeBronceEsp = $_FILES['img_insigBronceCompEsp']['name'];
        $rolSeleccionadoEsp = "";

       //Validamos que los campos no se encuentren vacios
       if(strlen($codigoCompEspecifica) >= 1 && 
        $cmbRolCompEspecifica != 'seleccione' && 
        strlen($nombreCompEspecifica) >= 1 && 
        $cmbCompGeneralEscogida != 'seleccione' &&
        strlen($cargaBadgeOroEsp) >= 1 && 
        strlen($cargaBadgePlataEsp) >=1 &&
        strlen($cargaBadgeBronceEsp) >=1){
       
            //Capturamos los datos del combobox de roles pandora
            if($cmbRolCompEspecifica == 'noble'){
                $rolSeleccionadoEsp = "Noble lider";
            }else if($cmbRolCompEspecifica == 'virtuoso'){
                $rolSeleccionadoEsp = "Virtuoso tecnologico";
            }else if($cmbRolCompEspecifica == 'maestro'){
                $rolSeleccionadoEsp = "Maestro de los procesos";
            }else if($cmbRolCompEspecifica == 'explorador'){
                $rolSeleccionadoEsp = "Explorador";
            }

            //Encapsulamos los datos obtenidos en un objeto de tipo Competencia especifica
            $nuevaCompEspecifica = new CompetenciaEspecifica(0, $cmbCompGeneralEscogida, $codigoCompEspecifica, $nombreCompEspecifica, $rolSeleccionadoEsp);

            if($competenciaControla->insertarCompEspecifica($nuevaCompEspecifica) == 1){
    
                $rutaDeBadgeOroEsp = $_FILES['img_insigOroCompEsp']['tmp_name'];
                $rutaDeBadgePlataEsp = $_FILES['img_insigPlataCompEsp']['tmp_name'];
                $rutaDeBadgeBronceEsp = $_FILES['img_insigBronceCompEsp']['tmp_name'];

                $nuevoNombreBadgeOroEsp = $generador->generadorDeNombres().".jpg";
                $nuevoNombreBadgePlataEsp = $generador->generadorDeNombres().".jpg";
                $nuevoNombreBadgeBronceEsp = $generador->generadorDeNombres().".jpg";
            
                $competenciaControla->subirBadgeOroCompEspecifica($rutaDeBadgeOroEsp, $nuevoNombreBadgeOroEsp, $cargaBadgeOroEsp, $nombreCompEspecifica);
                $competenciaControla->subirBadgePlataCompEspecifica($rutaDeBadgePlataEsp, $nuevoNombreBadgePlataEsp, $cargaBadgePlataEsp, $nombreCompEspecifica);
                $competenciaControla->subirBadgeBronceCompEspecifica($rutaDeBadgeBronceEsp, $nuevoNombreBadgeBronceEsp, $cargaBadgeBronceEsp, $nombreCompEspecifica);
                     
                ?>
                <h3 class="indicadorSatisfactorio">* Competencia específica registrada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar Competencia específica</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
    
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
            <?php
        }
    }
    
    //Capturamos el evento del boton de actualizacion de competencias generales
    if(isset($_POST['actualizarCompetenciaGeneral'])){

        //Capturamos los datos de los campos del formulario
        $idCompGeneralEditada = trim($_POST['id_comp_gral']);
        $editCodigoCompGeneral = trim($_POST['codigo']);
        $editRolCompGeneral = trim($_POST['rol']);
        $nombreEditCompGeneral = trim($_POST['nombre_comp_gral']);
        $cargaEditBadgeOro = $_FILES['img_insigOroCompGeneralEdit']['name'];
        $cargaEditBadgePlata = $_FILES['img_insigPlataCompGeneralEdit']['name'];
        $cargaEditBadgeBronce = $_FILES['img_insigBronceCompGeneralEdit']['name'];
        
 
        //Validamos que los campos no se encuentren vacios
        if($editCodigoCompGeneral != 'seleccione' && 
         $editRolCompGeneral != 'seleccione' && 
         strlen($nombreEditCompGeneral) >= 1){
        
     
        //Encapsulamos los datos obtenidos en un objeto de tipo Competencia general
        $compGeneralAEditar = new CompetenciaGeneral($idCompGeneralEditada, $editCodigoCompGeneral, $nombreEditCompGeneral, $editRolCompGeneral);

        if($competenciaControla->actualizarCompetenciaGeneral($compGeneralAEditar) == 1){

            //Verificamos si el usuario ha subido una imagen del badge oro para la competencia general
            if(strlen($cargaEditBadgeOro) >= 1){
                    
                $rutaDeBadgeOroEdit = $_FILES['img_insigOroCompGeneralEdit']['tmp_name'];

                //Consultamos si el evento ya tiene una imagen previa en servidor
                $nombreAntiguoBadgeOro = $competenciaControla->consultarNombreBadgeOroCompGeneral($idCompGeneralEditada);

                
                if($nombreAntiguoBadgeOro != null){
                    //Eliminamos el nombre de la imagen en base de datos 
                    $competenciaControla->limpiarNombreBadgeOroCompGeneral($idCompGeneralEditada, $nombreAntiguoBadgeOro);
                    //Eliminamos la imagen previa en servidor del badge oro
                    $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeOro);

                    $nuevoNombreBadgeOroEdit = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgeOroCompGeneral($rutaDeBadgeOroEdit, $nuevoNombreBadgeOroEdit, $cargaEditBadgeOro, $nombreEditCompGeneral);

                }else{
                    $nuevoNombreBadgeOroEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgeOroCompGeneral($rutaDeBadgeOroEdit, $nuevoNombreBadgeOroEditado, $cargaEditBadgeOro, $nombreEditCompGeneral);
                }  
            }

            //Verificamos si el usuario ha subido una imagen del badge plata para la competencia general
            if(strlen($cargaEditBadgePlata) >= 1){
                    
                $rutaDeBadgePlataEdit = $_FILES['img_insigPlataCompGeneralEdit']['tmp_name'];

                //Consultamos si el evento ya tiene una imagen previa en servidor
                $nombreAntiguoBadgePlata = $competenciaControla->consultarNombreBadgePlataCompGeneral($idCompGeneralEditada);

                //Eliminamos la imagen previa en servidor del badge plata
                if($nombreAntiguoBadgePlata != null){
                   //Eliminamos el nombre de la imagen en base de datos 
                   $competenciaControla->limpiarNombreBadgePlataCompGeneral($idCompGeneralEditada, $nombreAntiguoBadgePlata);
                   //Eliminamos la imagen previa en servidor del badge 
                   $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgePlata);

                   $nuevoNombreBadgePlataEdit = $generador->generadorDeNombres().".jpg";
                   $competenciaControla->subirBadgePlataCompGeneral($rutaDeBadgePlataEdit, $nuevoNombreBadgePlataEdit, $cargaEditBadgePlata, $nombreEditCompGeneral);

                }else{
                    $nuevoNombreBadgePlataEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgePlataCompGeneral($rutaDeBadgePlataEdit, $nuevoNombreBadgePlataEditado, $cargaEditBadgePlata, $nombreEditCompGeneral);
                }  
            }

            //Verificamos si el usuario ha subido una imagen del badge bronce para la competencia general
            if(strlen($cargaEditBadgeBronce) >= 1){
                    
                $rutaDeBadgeBronceEdit = $_FILES['img_insigBronceCompGeneralEdit']['tmp_name']; 

                //Consultamos si el evento ya tiene una imagen previa en servidor
                $nombreAntiguoBadgeBronce = $competenciaControla->consultarNombreBadgeBronceCompGeneral($idCompGeneralEditada);

                //Eliminamos la imagen previa en servidor del badge bronce
                if($nombreAntiguoBadgePlata != null){
                    //Eliminamos el nombre de la imagen en base de datos 
                   $competenciaControla->limpiarNombreBadgeBronceCompGeneral($idCompGeneralEditada, $nombreAntiguoBadgeBronce);
                   //Eliminamos la imagen previa en servidor del badge 
                   $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeBronce);

                   $nuevoNombreBadgeBronceEdit = $generador->generadorDeNombres().".jpg";
                   $competenciaControla->subirBadgeBronceCompGeneral($rutaDeBadgeBronceEdit, $nuevoNombreBadgeBronceEdit, $cargaEditBadgeBronce, $nombreEditCompGeneral);

                }else{
                    $nuevoNombreBadgeBronceEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgeBronceCompGeneral($rutaDeBadgeBronceEdit, $nuevoNombreBadgeBronceEditado, $cargaEditBadgeBronce, $nombreEditCompGeneral);
                }   
            }      
                            
            ?>
            <h3 class="indicadorSatisfactorio">* Competencia general actualizada satisfactoriamente</h3>  
            <?php
            header("Location: " . $_SERVER["HTTP_REFERER"]);

        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Competencia general</h3>  
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

    //Capturamos el evento del boton de actualizacion de una competencia especifica
    if(isset($_POST['actualizarCompetenciaEspecifica'])){

        //Capturamos los datos de los campos del formulario
        $idCompEspecificaAEditar = trim($_POST['id_comp_esp']);
        $codigoCompEspecificaEdit = trim($_POST['codigo']);
        $rolCompEspecificaEdit =  trim($_POST['rol']);
        $nombreCompEspecificaEdit = trim($_POST['nombre_competencia_esp']);
        $compGeneralEscogidaEdit =  trim($_POST['id_comp_gral']);
        $cargaBadgeOroEspEdit = $_FILES['img_insigOroCompEspEdit']['name'];
        $cargaBadgePlataEspEdit = $_FILES['img_insigPlataCompEspEdit']['name'];
        $cargaBadgeBronceEspEdit = $_FILES['img_insigBronceCompEspEdit']['name'];

       //Validamos que los campos no se encuentren vacios
       if(strlen($codigoCompEspecificaEdit) >= 1 && 
        $rolCompEspecificaEdit != 'seleccione' && 
        strlen($nombreCompEspecificaEdit) >= 1 && 
        $compGeneralEscogidaEdit != 'seleccione'){
       
            //Encapsulamos los datos obtenidos en un objeto de tipo Competencia especifica
            $compEspecificaAEditar = new CompetenciaEspecifica($idCompEspecificaAEditar, $compGeneralEscogidaEdit, $codigoCompEspecificaEdit, $nombreCompEspecificaEdit, $rolCompEspecificaEdit);

            if($competenciaControla->actualizarCompetenciaEspecifica($compEspecificaAEditar) == 1){

                //Verificamos si el usuario ha subido una imagen del badge oro para la competencia especifica
                if(strlen($cargaBadgeOroEspEdit) >= 1){
                        
                    $rutaDeBadgeOroCompEspEdit = $_FILES['img_insigOroCompEspEdit']['tmp_name'];

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguoBadgeOroCompEsp = $competenciaControla->consultarNombreBadgeOroCompEspecifica($idCompEspecificaAEditar);

                    //Eliminamos la imagen previa en servidor del badge oro
                    if($nombreAntiguoBadgeOroCompEsp != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                        $competenciaControla->limpiarNombreBadgeOroCompEspecifica($idCompEspecificaAEditar, $nombreAntiguoBadgeOroCompEsp);
                        //Eliminamos la imagen previa en servidor del badge oro
                        $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeOroCompEsp);

                        $nuevoNombreBadgeOroCompEspEdit = $generador->generadorDeNombres().".jpg";
                        $competenciaControla->subirBadgeOroCompEspecifica($rutaDeBadgeOroCompEspEdit, $nuevoNombreBadgeOroCompEspEdit, $cargaBadgeOroEspEdit, $nombreCompEspecificaEdit);
                    }

                    $nuevoNombreBadgeOroCompEspEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgeOroCompEspecifica($rutaDeBadgeOroCompEspEdit, $nuevoNombreBadgeOroCompEspEditado, $cargaBadgeOroEspEdit, $nombreCompEspecificaEdit);
                    
                }

                //Verificamos si el usuario ha subido una imagen del badge plata para la competencia especifica
                if(strlen($cargaBadgePlataEspEdit) >= 1){
                        
                    $rutaDeBadgePlataCompEspEdit = $_FILES['img_insigPlataCompEspEdit']['tmp_name'];

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguoBadgePlataCompEsp = $competenciaControla->consultarNombreBadgePlataCompEspecifica($idCompEspecificaAEditar);

                    //Eliminamos la imagen previa en servidor del badge plata
                    if($nombreAntiguoBadgePlataCompEsp != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $competenciaControla->limpiarNombreBadgePlataCompEspecifica($idCompEspecificaAEditar, $nombreAntiguoBadgePlataCompEsp);
                       //Eliminamos la imagen previa en servidor del badge plata
                       $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgePlataCompEsp);

                       $nuevoNombreBadgePlataCompEspEdit = $generador->generadorDeNombres().".jpg";
                       $competenciaControla->subirBadgePlataCompEspecifica($rutaDeBadgePlataCompEspEdit, $nuevoNombreBadgePlataCompEspEdit, $cargaBadgePlataEspEdit, $nombreCompEspecificaEdit);
                    }

                    $nuevoNombreBadgePlataCompEspEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgePlataCompEspecifica($rutaDeBadgePlataCompEspEdit, $nuevoNombreBadgePlataCompEspEditado, $cargaBadgePlataEspEdit, $nombreCompEspecificaEdit);
                    
                }

                //Verificamos si el usuario ha subido una imagen del badge bronce para la competencia especifica
                if(strlen($cargaBadgeBronceEspEdit) >= 1){
                        
                    $rutaDeBadgeBronceCompEspEdit = $_FILES['img_insigBronceCompEspEdit']['tmp_name']; 

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguoBadgeBronceCompEsp = $competenciaControla->consultarNombreBadgeBronceCompEspecifica($idCompEspecificaAEditar);

                    //Eliminamos la imagen previa en servidor del badge bronce
                    if($nombreAntiguoBadgeBronceCompEsp != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $competenciaControla->limpiarNombreBadgeBronceCompEspecifica($idCompEspecificaAEditar, $nombreAntiguoBadgeBronceCompEsp);
                       //Eliminamos la imagen previa en servidor del badge bronce
                       $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeBronceCompEsp);

                       $nuevoNombreBadgeBronceCompEspEdit = $generador->generadorDeNombres().".jpg";
                       $competenciaControla->subirBadgePlataCompEspecifica($rutaDeBadgeBronceCompEspEdit, $nuevoNombreBadgeBronceCompEspEdit, $cargaBadgeBronceEspEdit, $nombreCompEspecificaEdit);
                    }

                    $nuevoNombreBadgeBronceCompEspEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgeBronceCompEspecifica($rutaDeBadgeBronceCompEspEdit, $nuevoNombreBadgeBronceCompEspEditado, $cargaBadgeBronceEspEdit, $nombreCompEspecificaEdit);
                    
                }  
                     
                ?>
                <h3 class="indicadorSatisfactorio">* Competencia específica actualizada satisfactoriamente</h3>  
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);

            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar Competencia específica</h3>  
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

    //Capturamos el evento del boton de eliminacion de una competencia general
    if(isset($_POST['eliminarCompetenciaGeneral'])){

        $idCompetenciaGeneralAEliminar = trim($_POST['id_comp_gral']);
        $competenciaControla->eliminarCompetenciaGeneral($idCompetenciaGeneralAEliminar);
        header("Location: " . $_SERVER["HTTP_REFERER"]);

    }

    //Capturamos el evento del boton de eliminacion de una competencia especifica
    if(isset($_POST['eliminarCompetenciaEspecifica'])){

        $idCompetenciaEspecificaAEliminar = trim($_POST['id_comp_esp']);
        $competenciaControla->eliminarCompetenciaEspecifica($idCompetenciaEspecificaAEliminar);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    //Capturamos el evento del id de una competencia general a editar
    if(isset($_POST['idCompetenciaGralEdit'])){

        //Aqui traemos los datos de las competencias generales para su edición-----------------------------------
        $idCompetenciaGralEdit = $_POST['idCompetenciaGralEdit'];

        $sql = "select id_comp_gral, codigo, nombre_comp_gral, rol from tbl_competencia_general where id_comp_gral=".$idCompetenciaGralEdit;
        $resultCompGeneral = mysqli_query($conexion,$sql);

        $emparrayCompGenerales = array();
        while($row =mysqli_fetch_assoc($resultCompGeneral))
        {
            $emparrayCompGenerales[] = $row;
        }
        echo json_encode($emparrayCompGenerales);
        exit;
    }
    
?>