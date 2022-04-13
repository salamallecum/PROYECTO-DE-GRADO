<?php

require_once "utils/Conexion.php";
require_once "utils/generadorDeNombres.php";
require_once "controllers/EstudianteControlador.php";
require_once "model/Usuario.php";

//Creamos el objeto controlador que invocará los metodos CRUD
$estudianteControla = new EstudianteControlador();
$generador = new generadorNombres();

    //Capturamos el evento del boton de registro de estudiante
    if(isset($_POST['registrarEstudiante'])){

        //Capturamos los datos de los campos del formulario
        $nombresDeEstudiante = trim($_POST['nombres']);
        $apellidosDeEstudiante = trim($_POST['apellidos']);
        $emailEstudiante = trim($_POST['email']);
        $usernameEstudiante = trim($_POST['usuario']);
        $claveEstudiante = trim($_POST['clave']);

 
        //Validamos que los campos no se encuentren vacios
        if(strlen($nombresDeEstudiante) >= 1 && 
         strlen($apellidosDeEstudiante) >= 1 && 
         strlen($emailEstudiante) >= 1 && 
         strlen($usernameEstudiante) >= 1 && 
         strlen($claveEstudiante) >= 1 ){ 

            //Encapsulamos los datos obtenidos en un objeto de tipo Estudiante
            $nuevoEstudiante = new Usuario(0, $nombresDeEstudiante, $apellidosDeEstudiante, $usernameEstudiante, $claveEstudiante, 'Colombia', $emailEstudiante, 1);

            if($estudianteControla->insertarEstudiante($nuevoEstudiante) == 1){
                ?>
                <p class="indicadorSatisfactorio">* Registro exitoso</p>
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                
            }else{
                ?>
                <p class="indicadorDeCamposIncompletos">* Error al registrar un nuevo usuario</p>
                <?php
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }  
        
        }else{
            ?>
            <p class="indicadorDeCamposIncompletos">* Por favor diligencie todos los campos</p>
            <?php
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }


    //Capturamos el evento del boton de actualizacion de perfil de estudiante
    if(isset($_POST['ActualizarInfoEstudiante'])){

        //Validamos que los campos no se encuentren vacios
        if(strlen($_POST['idEstudiante']) >= 1 &&
        strlen($_POST['usuario']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['nombres']) >= 1 && 
        strlen($_POST['apellidos']) >= 1 && 
        strlen($_POST['direccion']) >= 1 && 
        strlen($_POST['telefono']) >= 1 && 
        strlen($_POST['ciudad']) >= 1 &&
        strlen($_POST['perfilProfesional']) >= 1){

            //Capturamos los datos de los campos del formulario
            $idDelEstudiante = trim($_POST['idEstudiante']);
            $usuarioEditEstudiante = trim($_POST['usuario']);
            $correoEditEstudiante = trim($_POST['email']);
            $nombresEditEstudiante = trim($_POST['nombres']);
            $apellidosEditEstudiante = trim($_POST['apellidos']);
            $direccionEditEstudiante = trim($_POST['direccion']);
            $telefonoEditEstudiante = trim($_POST['telefono']);
            $ciudadEditEstu = trim($_POST['ciudad']);
            $perfilProfEdit = trim($_POST['perfilProfesional']);
           
            //Actualizamos la informacion del estudiante en base de datos
            if($estudianteControla->actualizarInformacionDeEstudiante($idDelEstudiante, $usuarioEditEstudiante, $correoEditEstudiante, $nombresEditEstudiante, $apellidosEditEstudiante, $direccionEditEstudiante, $telefonoEditEstudiante, $ciudadEditEstu, $perfilProfEdit) == 1){
            
                $imagenDelEstudiante = $_FILES['fotoDePerfilEstudiante']['name'];
                
                //Verificamos si el usuario ha subido una imagen para el estudiante
                if(strlen($imagenDelEstudiante) >= 1){
                    
                    $rutaDeImagenEdit = $_FILES['fotoDePerfilEstudiante']['tmp_name'];

                    //Consultamos si el estudiante ya tiene una imagen previa en servidor
                    $nombreAntiguaImagen = $estudianteControla->consultarNombreImagenEstudiante($idDelEstudiante);

                    //Eliminamos la imagen previa en servidor
                    if($nombreAntiguaImagen != null || $nombreAntiguaImagen != ''){
                       //Eliminamos el nombre de la imagen en base de datos 
                       $estudianteControla->limpiarNombreImagenEstudiante($idDelEstudiante, $nombreAntiguaImagen);
                       //Eliminamos la imagen previa en servidor del evento
                       $estudianteControla->eliminarImagenDePerfilEstudiante($nombreAntiguaImagen);

                       $nuevoNombreArchivoImagenEstudianteEdit = $generador->generadorDeNombres().".jpg";
                       $estudianteControla->subirImagenDePerfilEstudiante($rutaDeImagenEdit, $nuevoNombreArchivoImagenEstudianteEdit, $imagenDelEstudiante, $nombresEditEstudiante);

                    }
        
                    $nuevoNombreArchivoImagenEstudianteEditado = $generador->generadorDeNombres().".jpg";
                    $estudianteControla->subirImagenDePerfilEstudiante($rutaDeImagenEdit, $nuevoNombreArchivoImagenEstudianteEditado, $imagenDelEstudiante, $nombresEditEstudiante);
                    
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

    //Capturamos el evento de logueo del usuario en la plataforma PANDORA
    if(isset($_POST['autenticarUsuario'])){

        //Iniciamos la creacion de sesiones
        session_start();

        //Capturamos los datos de los campos del formulario
        $usuario = trim($_POST['user']);
        $clave = trim($_POST['password']);

        $validar_login = $estudianteControla->validarExistenciaDeUsuario($usuario, $clave);

        if(mysqli_num_rows($validar_login) > 0){

            $idUsuario = $estudianteControla->consultarIdUsuario($usuario);
            $rolUsuario = $estudianteControla->consultarRolUsuario($usuario);

            //Creamos la sesion de usuario
            $_SESSION['usuario'] = $usuario;

            if($rolUsuario == 1){
                header("Location: ../DashBoard_Estudiante.php?Id_estudiante=".$idUsuario);
                exit;
            }

            if($rolUsuario == 2){
                header("Location: ../DashBoard_Profesor.php?Id_profesor=".$idUsuario);
                exit;
            }

            if($rolUsuario == 3){
                header("Location: ../DashBoard_Practicas.php");
                exit;
            }

            if($rolUsuario == 4){
                header("Location: ../DashBoard_Comite.php");
                exit;
            }

        }else{
            echo '
                    <script>
                        alert("Usuario no existe, por favor verifique los datos suministrados.");
                        window.location = "../Login.php";
                    </script>
            ';
            exit;
        }
    }

?>