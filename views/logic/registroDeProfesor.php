<?php

include("conexionDB.php");

if(isset($_POST['registroDeProfesor'])){

    //Validamos que los campos no se encuentren vacios
    if(strlen($_POST['nombres']) >= 1 && 
        strlen($_POST['apellidos']) >= 1 && 
        strlen($_POST['usuario']) >= 1 && 
        strlen($_POST['contraseña']) >= 1 && 
        strlen($_POST['email']) >= 1){

        //Capturamos los datos de los campos del formulario
        $nombres = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']);
        $correo = trim($_POST['email']);
       
        $consulta = "INSERT INTO tbl_usuario (`nombres_usuario`,`apellidos_usuario`,`username`,`password`,`pais`,`correo_usuario`,`id_rol`) VALUES ('$nombres','$apellidos','$usuario','$contraseña','Colombia','$correo',2)";

        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            ?>
            <h3 class="indicadorSatisfactorio">* Profesor registrado satisfactoriamente</h3>   
            <?php
        }else{
            ?>
            <h3 class="indicadorDeError">* Error al registrar Profesor</h3>   
            <?php
        }
    }else{
        ?>
        <h3 class="indicadorDeIncompletos">* Por favor diligencie todos los campos</h3>
        <?php
    }
}   

?>