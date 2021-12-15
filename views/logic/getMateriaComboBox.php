<?php

//ESTE SCRIPT SE ENCARGA DE CARGAR LA MATERIA LA CUAL SE LE HAASIGNADO A UN PROFESOR DETERMINADO
include("conexionDB.php");

//Recibimos el id del profesor seleccionado en su combobox
$id_profesor = $_POST['id_usuario'];

//Buscamos en base de datos las asignaturas asociadas a ese profesor
$consulta = "SELECT id_asignatura, nombre_asignatura FROM tbl_asignatura WHERE id_profesor = '$id_profesor' ORDER BY nombre_asignatura ASC";
$resultado = mysqli_query($conex, $consulta) or die(mysqli_error($conex));

$html = "<option value ='0'>Seleccione</option>";

//Recorremos los resultados obtenidos en base de datos
foreach($resultado as $opciones){
    $html =  "<option value='".$opciones['id_asignatura']."'>".$opciones['nombre_asignatura']."</option>";
}

//Cargamos los rsultados en el combobox de asignaturas
echo $html;

?>