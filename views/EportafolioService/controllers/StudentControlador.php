<?php

require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/utils/Conexion.php";

class StudentControlador{

    //Funcion que permite mostrar los datos personales del estudiante
    public function mostrarDatosEstudiante($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}

?>