<?php
include "Conexion.php";

//Este archivo se encarga de traer de base de datos los datos de los objetos del sistema (sea Eventos, Convocatorias, Eportafolios o Competencias) 
$c = new conectar();
$conexion = $c->conexion();

//Aqui traemos los datos de los eventos para su edición-----------------------------------
$idEventoEdit = $_POST['idEventoEdit'];

$sql = "select * from tbl_evento where id_evento=".$idEventoEdit;
$resultEvento = mysqli_query($conexion,$sql);

$emparrayEventos = array();
while($row =mysqli_fetch_assoc($resultEvento))
{
    $emparrayEventos[] = $row;
}
echo json_encode($emparrayEventos);
exit;

//Aqui traemos los datos de las convocatorias de comite para su edición-----------------------------------
$idConvComiteEdit = $_POST['idConvComiteEdit'];

$sql = "select * from tbl_convocatoriacomite where Id=".$idConvComiteEdit;
$resultConvComite = mysqli_query($conexion,$sql);

$emparrayConvComite = array();
while($row =mysqli_fetch_assoc($resultConvComite))
{
    $emparrayConvComite[] = $row;
}
echo json_encode($emparrayConvComite);
exit;

//Aqui traemos los datos de las convocatorias de practicas para su edición-----------------------------------
$idConvPracticasEdit = $_POST['idConvPracticasEdit'];

$sql = "select * from tbl_convocatoriapracticas where Id=".$idConvPracticasEdit;
$resultConvPracticas = mysqli_query($conexion,$sql);

$emparrayConvPracticas = array();
while($row =mysqli_fetch_assoc($resultConvPracticas))
{
    $emparrayConvPracticas[] = $row;
}
echo json_encode($emparrayConvPracticas);
exit;

//Aqui traemos los datos de las competencias generales para su edición-----------------------------------
$idCompetenciaGralEdit = $_POST['idCompetenciaGralEdit'];

$sql = "select * from tbl_competencia_general where id_comp_gral=".$idCompetenciaGralEdit;
$resultCompGeneral = mysqli_query($conexion,$sql);

$emparrayCompGenerales = array();
while($row =mysqli_fetch_assoc($resultCompGeneral))
{
    $emparrayCompGenerales[] = $row;
}
echo json_encode($emparrayCompGenerales);
exit;

//Aqui traemos los datos de las competencias especificas para su edición-----------------------------------
$idCompetenciaEspEdit = $_POST['idCompetenciaEspEdit'];

$sql = "select * from tbl_competencia_especifica where id_comp_esp=".$idCompetenciaEspEdit;
$resultCompEspecifica = mysqli_query($conexion,$sql);

$emparrayCompEspecificas = array();
while($row =mysqli_fetch_assoc($resultCompEspecifica))
{
    $emparrayCompEspecificas[] = $row;
}
echo json_encode($emparrayCompEspecificas);
exit;