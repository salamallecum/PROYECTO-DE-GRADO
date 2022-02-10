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
        $idCompGeneralEditada = trim($_POST['idCompGeneralEdit']);
        $cmbEditCodigoCompGeneral = $_REQUEST['cmbCodigosCompGeneralesEdit'];
        $cmbEditRolCompGeneral = $_REQUEST['cmbRolesPandoraEdit'];
        $nombreEditCompGeneral = trim($_POST['descripcionCompetenciaGeneralEdit']);
        $cargaEditBadgeOro = $_FILES['img_insigOroCompGeneralEdit']['name'];
        $cargaEditBadgePlata = $_FILES['img_insigPlataCompGeneralEdit']['name'];
        $cargaEditBadgeBronce = $_FILES['img_insigBronceCompGeneralEdit']['name'];
        $codigoEditSeleccionado = "";
        $rolEditSeleccionado = "";
 
        //Validamos que los campos no se encuentren vacios
        if($cmbEditCodigoCompGeneral != 'seleccione' && 
         $cmbEditRolCompGeneral != 'seleccione' && 
         strlen($nombreEditCompGeneral) >= 1){
        
        //Capturamos los datos del combobox de codigos de competencias generales
        if($cmbEditCodigoCompGeneral == 'A'){
            $codigoEditSeleccionado = "A";
        }else if($cmbEditCodigoCompGeneral == 'B'){
            $codigoEditSeleccionado = "B";
        }else if($cmbEditCodigoCompGeneral == 'C'){
            $codigoEditSeleccionado = "C";
        }else if($cmbEditCodigoCompGeneral == 'D'){
            $codigoEditSeleccionado = "D";
        }else if($cmbEditCodigoCompGeneral == 'E'){
            $codigoEditSeleccionado = "E";
        }else if($cmbEditCodigoCompGeneral == 'F'){
            $codigoEditSeleccionado = "F";
        }else if($cmbEditCodigoCompGeneral == 'G'){
            $codigoEditSeleccionado = "G";
        }else if($cmbEditCodigoCompGeneral == 'H'){
            $codigoEditSeleccionado = "H";
        }else if($cmbEditCodigoCompGeneral == 'I'){
            $codigoEditSeleccionado = "I";
        }else if($cmbEditCodigoCompGeneral == 'J'){
            $codigoEditSeleccionado = "J";
        }else if($cmbEditCodigoCompGeneral == 'K'){
            $codigoEditSeleccionado = "K";
        }else if($cmbEditCodigoCompGeneral == 'L'){
            $codigoEditSeleccionado = "L";
        }else if($cmbEditCodigoCompGeneral == 'M'){
            $codigoEditSeleccionado = "M";
        }else if($cmbEditCodigoCompGeneral == 'N'){
            $codigoEditSeleccionado = "N";
        }else if($cmbEditCodigoCompGeneral == 'Ñ'){
            $codigoEditSeleccionado = "Ñ";
        }else if($cmbEditCodigoCompGeneral == 'O'){
            $codigoEditSeleccionado = "O";
        }else if($cmbEditCodigoCompGeneral == 'P'){
            $codigoEditSeleccionado = "P";
        }else if($cmbEditCodigoCompGeneral == 'Q'){
            $codigoEditSeleccionado = "Q";
        }else if($cmbEditCodigoCompGeneral == 'R'){
            $codigoEditSeleccionado = "R";
        }else if($cmbEditCodigoCompGeneral == 'S'){
            $codigoEditSeleccionado = "S";
        }else if($cmbEditCodigoCompGeneral == 'T'){
            $codigoEditSeleccionado = "T";
        }else if($cmbEditCodigoCompGeneral == 'U'){
            $codigoEditSeleccionado = "U";
        }else if($cmbEditCodigoCompGeneral == 'V'){
            $codigoEditSeleccionado = "V";
        }else if($cmbEditCodigoCompGeneral == 'W'){
            $codigoEditSeleccionado = "W";
        }else if($cmbEditCodigoCompGeneral == 'X'){
            $codigoEditSeleccionado = "X";
        }else if($cmbEditCodigoCompGeneral == 'Y'){
            $codigoEditSeleccionado = "Y";
        }else if($cmbEditCodigoCompGeneral == 'Z'){
            $codigoEditSeleccionado = "Z";
        }

        //Capturamos los datos del combobox de roles pandora
        if($cmbEditRolCompGeneral == 'noble'){
            $rolEditSeleccionado = "Noble Lider";
        }else if($cmbEditRolCompGeneral == 'virtuoso'){
            $rolEditSeleccionado = "Virtuoso Tecnológico";
        }else if($cmbEditRolCompGeneral == 'maestro'){
            $rolEditSeleccionado = "Maestro de los procesos";
        }else if($cmbEditRolCompGeneral == 'explorador'){
            $rolEditSeleccionado = "Explorador";
        }

        //Encapsulamos los datos obtenidos en un objeto de tipo Competencia general
        $compGeneralAEditar = new CompetenciaGeneral($idCompGeneralEditada, $codigoEditSeleccionado, $nombreEditCompGeneral, $rolEditSeleccionado);

        if($competenciaControla->actualizarCompetenciaGeneral($compGeneralAEditar) == 1){

            //Verificamos si el usuario ha subido una imagen del badge oro para la competencia general
            if(strlen($cargaEditBadgeOro) >= 1){
                    
                $rutaDeBadgeOroEdit = $_FILES['img_insigOroCompGeneralEdit']['tmp_name'];

                //Consultamos si el evento ya tiene una imagen previa en servidor
                $nombreAntiguoBadgeOro = $competenciaControla->consultarNombreBadgeOroCompGeneral($idCompGeneralEditada);

                //Eliminamos la imagen previa en servidor del badge oro
                if($nombreAntiguoBadgeOro != null){
                    $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeOro);
                }

                $nuevoNombreBadgeOroEditado = $generador->generadorDeNombres().".jpg";
                $competenciaControla->subirBadgeOroCompGeneral($rutaDeBadgeOroEdit, $nuevoNombreBadgeOroEditado, $cargaEditBadgeOro, $nombreEditCompGeneral);
                
            }

            //Verificamos si el usuario ha subido una imagen del badge plata para la competencia general
            if(strlen($cargaEditBadgePlata) >= 1){
                    
                $rutaDeBadgePlataEdit = $_FILES['img_insigPlataCompGeneralEdit']['tmp_name'];

                //Consultamos si el evento ya tiene una imagen previa en servidor
                $nombreAntiguoBadgePlata = $competenciaControla->consultarNombreBadgePlataCompGeneral($idCompGeneralEditada);

                //Eliminamos la imagen previa en servidor del badge plata
                if($nombreAntiguoBadgePlata != null){
                    $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgePlata);
                }

                $nuevoNombreBadgePlataEditado = $generador->generadorDeNombres().".jpg";
                $competenciaControla->subirBadgePlataCompGeneral($rutaDeBadgePlataEdit, $nuevoNombreBadgePlataEditado, $cargaEditBadgePlata, $nombreEditCompGeneral);
                
            }

            //Verificamos si el usuario ha subido una imagen del badge bronce para la competencia general
            if(strlen($cargaEditBadgeBronce) >= 1){
                    
                $rutaDeBadgeBronceEdit = $_FILES['img_insigBronceCompGeneralEdit']['tmp_name']; 

                //Consultamos si el evento ya tiene una imagen previa en servidor
                $nombreAntiguoBadgeBronce = $competenciaControla->consultarNombreBadgeBronceCompGeneral($idCompGeneralEditada);

                //Eliminamos la imagen previa en servidor del badge bronce
                if($nombreAntiguoBadgePlata != null){
                    $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeBronce);
                }

                $nuevoNombreBadgeBronceEditado = $generador->generadorDeNombres().".jpg";
                $competenciaControla->subirBadgeBronceCompGeneral($rutaDeBadgeBronceEdit, $nuevoNombreBadgeBronceEditado, $cargaEditBadgeBronce, $nombreEditCompGeneral);
                
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
        }
    }

    //Capturamos el evento del boton de registro de una nueva competencia especifica
    if(isset($_POST['actualizarCompetenciaEspecifica'])){

        //Capturamos los datos de los campos del formulario
        $idCompEspecificaAEditar = trim($_POST['idCompEspecificaAEdit']);
        $codigoCompEspecificaEdit = trim($_POST['txtCodigoCompEspecíficEdit']);
        $cmbRolCompEspecificaEdit = $_REQUEST['cmbRolesPandoraEspEdit'];
        $nombreCompEspecificaEdit = trim($_POST['descripcionCompetenciaEspecificaEdit']);
        $cmbCompGeneralEscogidaEdit = $_REQUEST['cmbCompetenciasGeneralesEdit'];
        $cargaBadgeOroEspEdit = $_FILES['img_insigOroCompEspEdit']['name'];
        $cargaBadgePlataEspEdit = $_FILES['img_insigPlataCompEspEdit']['name'];
        $cargaBadgeBronceEspEdit = $_FILES['img_insigBronceCompEspEdit']['name'];
        $rolSeleccionadoEspEdit = "";

       //Validamos que los campos no se encuentren vacios
       if(strlen($codigoCompEspecificaEdit) >= 1 && 
        $cmbRolCompEspecificaEdit != 'seleccione' && 
        strlen($nombreCompEspecificaEdit) >= 1 && 
        $cmbCompGeneralEscogidaEdit != 'seleccione'){
       
            //Capturamos los datos del combobox de roles pandora
            if($cmbRolCompEspecificaEdit == 'noble'){
                $rolSeleccionadoEspEdit = "Noble Lider";
            }else if($cmbRolCompEspecificaEdit == 'virtuoso'){
                $rolSeleccionadoEspEdit = "Virtuoso Tecnológico";
            }else if($cmbRolCompEspecificaEdit == 'maestro'){
                $rolSeleccionadoEspEdit = "Maestro de los procesos";
            }else if($cmbRolCompEspecificaEdit == 'explorador'){
                $rolSeleccionadoEspEdit = "Explorador";
            }

            //Encapsulamos los datos obtenidos en un objeto de tipo Competencia especifica
            $compEspecificaAEditar = new CompetenciaEspecifica($idCompEspecificaAEditar, $cmbCompGeneralEscogidaEdit, $codigoCompEspecificaEdit, $nombreCompEspecificaEdit, $rolSeleccionadoEspEdit);

            if($competenciaControla->insertarCompEspecifica($compEspecificaAEditar) == 1){

                //Verificamos si el usuario ha subido una imagen del badge oro para la competencia especifica
                if(strlen($cargaBadgeOroEspEdit) >= 1){
                        
                    $rutaDeBadgeOroCompEspEdit = $_FILES['img_insigOroCompEspEdit']['tmp_name'];

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguoBadgeOroCompEsp = $competenciaControla->consultarNombreBadgeOroCompEspecifica($idCompEspecificaAEditar);

                    //Eliminamos la imagen previa en servidor del badge oro
                    if($nombreAntiguoBadgeOroCompEsp != null){
                        $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeOroCompEsp);
                    }

                    $nuevoNombreBadgeOroCompEspEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgeOroCompEspecifica($rutaDeBadgeOroCompEspEdit, $nuevoNombreBadgeOroCompEspEditado, $cargaBadgeOroEspEdit, $nombreCompEspecificaEdit);
                    
                }

                //Verificamos si el usuario ha subido una imagen del badge plata para la competencia especifica
                if(strlen($cargaBadgePlataEspEdit) >= 1){
                        
                    $rutaDeBadgePlataCompEspEdit = $_FILES['img_insigPlataCompGeneralEdit']['tmp_name'];

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguoBadgePlataCompEsp = $competenciaControla->consultarNombreBadgePlataCompEspecifica($idCompEspecificaAEditar);

                    //Eliminamos la imagen previa en servidor del badge plata
                    if($nombreAntiguoBadgePlataCompEsp != null){
                        $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgePlataCompEsp);
                    }

                    $nuevoNombreBadgePlataCompEspEditado = $generador->generadorDeNombres().".jpg";
                    $competenciaControla->subirBadgePlataCompEspecifica($rutaDeBadgePlataCompEspEdit, $nuevoNombreBadgePlataCompEspEditado, $cargaBadgePlataEspEdit, $nombreCompEspecificaEdit);
                    
                }

                //Verificamos si el usuario ha subido una imagen del badge bronce para la competencia especifica
                if(strlen($cargaBadgeBronceEspEdit) >= 1){
                        
                    $rutaDeBadgeBronceCompEspEdit = $_FILES['img_insigBronceCompGeneralEdit']['tmp_name']; 

                    //Consultamos si el evento ya tiene una imagen previa en servidor
                    $nombreAntiguoBadgeBronceCompEsp = $competenciaControla->consultarNombreBadgeBronceCompEspecifica($idCompEspecificaAEditar);

                    //Eliminamos la imagen previa en servidor del badge bronce
                    if($nombreAntiguoBadgePlataCompEsp != null){
                        $competenciaControla->eliminarImagenBadge($nombreAntiguoBadgeBronceCompEsp);
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
        }
    }

?>