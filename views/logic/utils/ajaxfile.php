<?php
include "Conexion.php";

$userid = $_POST['userid'];

$c = new conectar();
$conexion = $c->conexion();

$sql = "select * from tbl_evento where id_evento=".$userid;
$result = mysqli_query($conexion,$sql);


$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
echo json_encode($emparray);

exit;