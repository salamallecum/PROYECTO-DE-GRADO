<?php

require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/utils/Conexion.php";

class ProfesorControlador{

    //Funcion que registra un nuevo profesor en base de datos
    public function insertarProfesor(Usuario $user){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idProfesor = $user->getId();
        $nombreProfe = $user->getNombres();
        $apellidosProfe = $user->getApellidos();
        $usuarioProfe = $user->getUsername();
        $claveProfe = $user->getClave();
        $paisProfe = $user->getPais();
        $emailProfe = $user->getEmail();
        $rolDeProfe = $user->getRol();

        $sql = "INSERT INTO tbl_usuario (id_usuario, nombres_usuario, apellidos_usuario, username, clave, pais, correo_usuario, id_rol)
                            values ('$idProfesor', '$nombreProfe', '$apellidosProfe', '$usuarioProfe', '$claveProfe', '$paisProfe', '$emailProfe', '$rolDeProfe')";

        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que muestra el listado de profesores registrados en base de datos 
    public function mostrarProfesoresRegistrados($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Funcion que permite traer de base de datos los datos de un profesor para su edicion
    public function consultarDatosDeUnProfesor(string $sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }

    //Funcion que permite actualizar la informacion de un profesor en base de datos
    public function actualizarInformacionDeProfesor(int $idProf, string $usuarioProf, string $correoProf, string $nombresProf, string $apellidosProf, string $direccionProf, string $telefonoProf, string $ciudadProfe, string $perfilProf){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_usuario SET username='$usuarioProf', correo_usuario='$correoProf', nombres_usuario='$nombresProf', apellidos_usuario='$apellidosProf', direccion='$direccionProf', telefono='$telefonoProf', ciudad='$ciudadProfe', descripcion='$perfilProf'
                            WHERE  id_usuario=$idProf";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite consultar el nombre de la foto de perfil de un profesor
    public function consultarNombreImagenProfesor(int $idProf){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT foto_usuario from tbl_usuario where id_usuario = $idProf";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['foto_usuario'];
        }

    }

    //Funcion que elimina de base de datos el nombre de la foto de perfil de un profesor
    public function limpiarNombreImagenProfesor(int $idProf, string $nombreImgProfesor){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_usuario SET foto_usuario = null WHERE foto_usuario='$nombreImgProfesor' and id_usuario=".$idProf;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite eliminar la imagen de perfil de un profesor
    public function eliminarImagenDePerfilProfesor(string $nomImg){

        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $archAEliminar = $base_dir."/MockupsPandora/views/profileImages/".$nomImg;

        if(file_exists($archAEliminar)){

            if(unlink($archAEliminar)){}else{
                echo "La imagen ($nomImg) no se pudo eliminar";
            }
        
        }else{
            echo "No se encontró la imagen ($nomImg)";
        }
    }

    //Funcion que permite cargar una imagen del evento
    public function subirImagenDePerfilProfesor($rutaImg, $nombreImg, $imgProfesor, $nomProfesor){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta eventosImages
        if(!file_exists('./profileImages')){
            mkdir('./profileImages', 0777, true);

            if(file_exists('./profileImages')){
                if(move_uploaded_file($rutaImg, './profileImages/'. $imgProfesor)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagen = "UPDATE tbl_usuario SET foto_usuario='$nombreImg' WHERE nombres_usuario='$nomProfesor'";
                    $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("./profileImages/".$imgProfesor, "./profileImages/".$nombreImg);

                }else{}
            }
        }else{
            if(move_uploaded_file($rutaImg, './profileImages/'. $imgProfesor)){

               //Guardamos el nombre del archivo del enunciado en la base de datos
               $queryGuardarNombreImagen = "UPDATE tbl_usuario SET foto_usuario='$nombreImg' WHERE nombres_usuario='$nomProfesor'";
               $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

               //Renombramos el achivo del enunciado con el nombre guardado en bd 
               rename("./profileImages/".$imgProfesor, "./profileImages/".$nombreImg);

            }else{} 
        } 
    }

    //Funcion que actualiza la contraseña de acceso al sistema de un profesor
    public function actualizarContraseña(int $idProf, string $nuevaContraseña){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_usuario SET clave = '$nuevaContraseña' WHERE id_usuario=".$idProf;
        $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        return true;
    }

    //Funcion que permite consultar lacontraseña que tiene el usuario previamente registrada en el sistema
    public function consultarAntiguaContraseña(int $idProf){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT clave from tbl_usuario where id_usuario = $idProf";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['clave'];
        }
    }


}

?>