<?php

    require_once "utils/Conexion.php";
    require_once "controllers/MateriaControlador.php";
    require_once "model/Materia.php";

    //Capturamos el evento del boton de registro de materia
    if(isset($_POST['registroDeMateria'])){

        //Capturamos los datos de los campos del formulario
        $materia = trim($_POST['materia']);
        $codigo = trim($_POST['codigo']);
        $cmbSemestres = $_REQUEST['cmbSemestres'];
        $cmbTiposDeMateria = $_REQUEST['cmbTipoMaterias'];
        $cmbJornadas = $_REQUEST['cmbJornadas'];
        $semestreSeleccionado = "";
        $tipoMatSeleccionado = "";
        $jornadaSeleccionada = "";

        //Validamos que los campos no se encuentren vacios
        if(strlen($materia) >= 1 && 
            strlen($codigo) >= 1 && 
            $cmbSemestres != 'seleccione' && 
            $cmbTiposDeMateria != 'seleccione' &&  
            $cmbJornadas != 'seleccione'){

                //Capturamos los datos del combobox de semestres
                if($cmbSemestres == '1'){
                    $semestreSeleccionado = "1";
                }else if($cmbSemestres == '2'){
                    $semestreSeleccionado = "2";
                }else if($cmbSemestres == '3'){
                    $semestreSeleccionado = "3";
                }else if($cmbSemestres == '4'){
                    $semestreSeleccionado = "4";
                }else if($cmbSemestres == '5'){
                    $semestreSeleccionado = "5";
                }else if($cmbSemestres == '6'){
                    $semestreSeleccionado = "6";
                }else if($cmbSemestres == '7'){
                    $semestreSeleccionado = "7";
                }else if($cmbSemestres == '8'){
                    $semestreSeleccionado = "8";
                }else if($cmbSemestres == '9'){
                    $semestreSeleccionado = "9";
                }

                //Capturamos los datos del combobox de tipos de materias
                if($cmbTiposDeMateria == 'obligatoria'){
                    $tipoMatSeleccionado = "Obligatoria";
                }else if($cmbTiposDeMateria == 'electiva'){
                    $tipoMatSeleccionado = "Electiva";
                }

                //Capturamos los datos del combobox de tipos de materias
                if($cmbJornadas == 'diurna'){
                    $jornadaSeleccionada = "Diurna";
                }else if($cmbJornadas == 'nocturna'){
                    $jornadaSeleccionada = "Nocturna";
                }
    
                //Encapsulamos los datos obtenidos en un objeto de tipo Materia
                $nuevaMateria = new Materia(0, $materia, $codigo, $semestreSeleccionado, $tipoMatSeleccionado, $jornadaSeleccionada, 0);

                //Creamos el objeto controlador que invocará los metodos CRUD
                $materiaControla = new MateriaControlador();

                if($materiaControla->insertarMateria($nuevaMateria) == 1){
                    ?>
                    <h3 class="indicadorSatisfactorio">* Registro de materia exitoso</h3>
                    <?php
                }else{
                    ?>
                    <h3 class="indicadorDeCamposIncompletos">* Error al registrar una nueva materia</h3>
                    <?php
                }  
        
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
            <?php
        }
    }

    //Capturamos el evento del boton de asignacion de materia
    if(isset($_POST['asignacionDeMateria'])){

        //Capturamos los datos de los campos del formulario
        $cmbProfesores = $_REQUEST['cbx_profesor'];
        $cmbMaterias = $_REQUEST['cbx_materia'];

        //Validamos que los campos no se encuentren vacios
        if($cmbProfesores != 'seleccione' && 
            $cmbMaterias != 'seleccione'){

                //Creamos el objeto controlador que invocará los metodos CRUD
                $materiaControla = new MateriaControlador();

                if($materiaControla->asignarMateria($cmbMaterias, $cmbProfesores) == 1){
                    ?>
                    <h3 class="indicadorSatisfactorio">* Asignación de materia exitosa</h3>
                    <?php
                }else{
                    ?>
                    <h3 class="indicadorDeCamposIncompletos">* Error al asignar la materia</h3>
                    <?php
                }  
         
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
            <?php
        }

    }
    
?>