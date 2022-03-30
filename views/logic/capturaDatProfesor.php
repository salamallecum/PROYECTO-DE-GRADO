<?php

    require_once "utils/Conexion.php";
    require_once "utils/generadorDeNombres.php";
    require_once "controllers/ProfesorControlador.php";
    require_once "model/Usuario.php";

    //Creamos el objeto controlador que invocará los metodos CRUD
    $profesorControla = new ProfesorControlador();
    $generador = new generadorNombres();

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









    //Capturamos el evento del boton de actualizacion de perfil de profesor
    if(isset($_POST['ActualizarInfoProfesor'])){

        //Validamos que los campos no se encuentren vacios
        if(strlen($_POST['idProfesor']) >= 1 &&
        strlen($_POST['usuario']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['nombres']) >= 1 && 
        strlen($_POST['apellidos']) >= 1 && 
        strlen($_POST['direccion']) >= 1 && 
        strlen($_POST['telefono']) >= 1 && 
        strlen($_POST['ciudad']) >= 1 &&
        strlen($_POST['perfilProfesional']) >= 1){

            //Capturamos los datos de los campos del formulario
            $idDelProfesor = trim($_POST['idProfesor']);
            $usuarioEditProfesor = trim($_POST['usuario']);
            $correoEditProfesor = trim($_POST['email']);
            $nombresEditProfesor = trim($_POST['nombres']);
            $apellidosEditProfesor = trim($_POST['apellidos']);
            $direccionEditProfesor = trim($_POST['direccion']);
            $telefonoEditProfesor = trim($_POST['telefono']);
            $ciudadEditProfe = trim($_POST['ciudad']);
            $perfilProfEdit = trim($_POST['perfilProfesional']);
           
            //Actualizamos la informacion del profesor en base de datos
            if($profesorControla->actualizarInformacionDeProfesor($idDelProfesor, $usuarioEditProfesor, $correoEditProfesor, $nombresEditProfesor, $apellidosEditProfesor, $direccionEditProfesor, $telefonoEditProfesor, $ciudadEditProfe, $perfilProfEdit) == 1){
            
                $imagenDelProfesor = $_FILES['fotoDePerfilProfe']['name'];
                
                //Verificamos si el usuario ha subido una imagen para el profesor
                if(strlen($imagenDelProfesor) >= 1){
                    
                    $rutaDeImagenEdit = $_FILES['fotoDePerfilProfe']['tmp_name'];

                    //Consultamos si el profesor ya tiene una imagen previa en servidor
                    $nombreAntiguaImagen = $profesorControla->consultarNombreImagenProfesor($idDelProfesor);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagen != null){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $profesorControla->limpiarNombreImagenProfesor($nombreAntiguaImagen);
                       //Eliminamos la imagen previa en servidor del evento
                       $profesorControla->eliminarImagen($nombreAntiguaImagen);

                       $nuevoNombreArchivoImagenProfesorEdit = $generador->generadorDeNombres().".jpg";
                       $profesorControla->subirImagenProfesor($rutaDeImagenEdit, $nuevoNombreArchivoImagenProfesorEdit, $imagenDelProfesor, $nombresEditProfesor);

                    }
        
                    $nuevoNombreArchivoImagenProfesorEditado = $generador->generadorDeNombres().".jpg";
                    $eventoControla->subirImagenEvento($rutaDeImagenEdit, $nuevoNombreArchivoImagenProfesorEditado, $imagenDelProfesor, $nombresEditProfesor);
                    
                }        
            
                ?>
                <h3 class="indicadorSatisfactorio">* Información actualizada exitosamente</h3>
                <?php
            }else{
                ?>
                <h3 class="indicadorDeCamposIncompletos">* Error al actualizar información</h3>
                <?php
            }  
        
        }else{
            ?>
            <h3 class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</h3>
            <?php
        }
    }
    
?>