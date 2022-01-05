<?php

    require_once "utils/Conexion.php";
    require_once "controllers/ProfesorControlador.php";
    require_once "model/Usuario.php";

    //Capturamos el evento del boton de registro de profesor
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

            //Encapsulamos los datos en un objeto de tipo Usuario
            $nuevoProfesor = new Usuario(0, $nombres, $apellidos, $usuario, $contraseña, "Colombia", $correo, 2);

            //Creamos el objeto controlador que invocará los metodos CRUD
            $profesorControla = new ProfesorControlador();

            if($profesorControla->insertarProfesor($nuevoProfesor) == 1){
                ?>
                <h3 class="indicadorSatisfactorio">* Registro de profesor exitoso</h3>
                <?php
            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al registrar un nuevo profesor</h3>
                <?php
            }  
        
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
            <?php
        }
    }
    
?>