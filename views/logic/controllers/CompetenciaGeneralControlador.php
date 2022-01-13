<?php

class CompetenciaGeneralControlador{

    //Funcion que permite mostrar las competencias
    public function mostrarDatosCompetencias($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}
?>