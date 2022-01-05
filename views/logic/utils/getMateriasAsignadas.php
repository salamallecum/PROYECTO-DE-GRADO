<?php

$conexion=mysqli_connect('localhost','root','','pandora');
$profesor=$_POST['profesor'];

	$sql="SELECT id_asignatura,
			nombre_asignatura 
		from tbl_asignatura 
		where id_profesor='$profesor'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<select class='cmbMateriasAsignadas' id='cbx_asignadas' name='cmbAsignadas' multiple>";
    

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";

?>