<?php

    require_once "utils/Conexion.php";
    require_once "controllers/CompetenciaControlador.php";
    require_once "model/CompetenciaEspecifica.php";
    require_once "model/CompetenciaGeneral.php";
    require_once "utils/generadorDeNombres.php";

    $listadoCompGenerales = array();

    //Capturamos el evento del boton de analisis de competencias generales
    if(isset($_POST['analizarCompetenciasGenerales'])){



    }

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
                $rolSeleccionado = "Noble Lider";
            }else if($cmbRolCompGeneral == 'virtuoso'){
                $rolSeleccionado = "Virtuoso Tecnológico";
            }else if($cmbRolCompGeneral == 'maestro'){
                $rolSeleccionado = "Maestro de los procesos";
            }else if($cmbRolCompGeneral == 'explorador'){
                $rolSeleccionado = "Explorador";
            }

            //Encapsulamos los datos obtenidos en un objeto de tipo Competencia general
            $nuevaCompGeneral = new CompetenciaGeneral(0, $codigoSeleccionado, $nombreCompGeneral, $rolSeleccionado);

            //Creamos el objeto controlador que invocará los metodos CRUD
            $competenciaControla = new CompetenciaControlador();

            if($competenciaControla->insertarCompGeneral($nuevaCompGeneral) == 1){
    
                $rutaDeBadgeOro = $_FILES['img_insigOroCompGeneral']['tmp_name'];
                $rutaDeBadgePlata = $_FILES['img_insigPlataCompGeneral']['tmp_name'];
                $rutaDeBadgeBronce = $_FILES['img_insigBronceCompGeneral']['tmp_name'];

                $generador = new generadorNombres();

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
                $rolSeleccionadoEsp = "Noble Lider";
            }else if($cmbRolCompEspecifica == 'virtuoso'){
                $rolSeleccionadoEsp = "Virtuoso Tecnológico";
            }else if($cmbRolCompEspecifica == 'maestro'){
                $rolSeleccionadoEsp = "Maestro de los procesos";
            }else if($cmbRolCompEspecifica == 'explorador'){
                $rolSeleccionadoEsp = "Explorador";
            }

            //Encapsulamos los datos obtenidos en un objeto de tipo Competencia especifica
            $nuevaCompEspecifica = new CompetenciaEspecifica(0, $cmbCompGeneralEscogida, $codigoCompEspecifica, $nombreCompEspecifica, $rolSeleccionadoEsp);

            //Creamos el objeto controlador que invocará los metodos CRUD
            $competenciaControla = new CompetenciaControlador();

            if($competenciaControla->insertarCompEspecifica($nuevaCompEspecifica) == 1){
    
                $rutaDeBadgeOroEsp = $_FILES['img_insigOroCompEsp']['tmp_name'];
                $rutaDeBadgePlataEsp = $_FILES['img_insigPlataCompEsp']['tmp_name'];
                $rutaDeBadgeBronceEsp = $_FILES['img_insigBronceCompEsp']['tmp_name'];

                $generador = new generadorNombres();

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
    

?>