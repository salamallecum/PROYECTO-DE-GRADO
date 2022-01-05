<?php
//Obtenemos longitud para el nombre
$longitud = $_GET['longitud'];

function generadorDeNombre(){

    $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
    $clave = "";
    for($i=0; $i<6; $i++){
        $num = rand(1, strlen($chars));
        $clave .=substr($chars, $num-1, 1);
    }
    return $clave;
}
?>