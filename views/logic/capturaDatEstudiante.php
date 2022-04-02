<?php

require_once "utils/Conexion.php";
require_once "utils/generadorDeNombres.php";
require_once "controllers/EstudianteControlador.php";
require_once "model/Usuario.php";

//Creamos el objeto controlador que invocará los metodos CRUD
$estudianteControla = new EstudianteControlador();
$generador = new generadorNombres();

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
    
?>