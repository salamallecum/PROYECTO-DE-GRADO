<?php

require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/utils/Conexion.php";

class TrabajoDestacadoControlador{

    //Funcion que permite mostrar los datos de los trabajos destacados del estudiante
    public function mostrarTrabajosDestacados($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));;
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}

?>