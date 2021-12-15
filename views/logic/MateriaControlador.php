<?php

//Invocamos el archivo de conexion a la BD
include("conexionDB.php");

//Capturamos el evento del boton de registro de materias
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
     
        //Registramos lo obtenido en bd
        $consulta = "INSERT INTO tbl_asignatura (`nombre_asignatura`,`codigo`,`semestre`,`tipo`,`jornada`) VALUES ('$materia','$codigo','$semestreSeleccionado','$tipoMatSeleccionado','$jornadaSeleccionada')";

        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            ?>
            <h3 class="indicadorSatisfactorio">* Materia registrada satisfactoriamente</h3>   
            <?php
        }else{
            ?>
            <h3 class="indicadorDeError">* Error al registrar Materia</h3>   
            <?php
        }
    }else{
        ?>
        <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
        <?php
    }
}   

?>