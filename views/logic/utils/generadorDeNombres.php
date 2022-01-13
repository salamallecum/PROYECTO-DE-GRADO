<?php

class generadorNombres{

    public function generadorDeNombres(){

        $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
        $clave = "";
        for($i=0; $i<6; $i++){
            $num = rand(1, strlen($chars));
            $clave .=substr($chars, $num-1, 1);
        }
        return $clave;
    }
}

?>