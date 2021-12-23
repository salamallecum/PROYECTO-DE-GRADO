<?php

//Creamos la conexion
function conectar(){
    $conex = mysqli_connect("localhost", "root", "", "pandora");
    return $conex;
}

?>