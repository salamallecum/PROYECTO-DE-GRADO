<?php

require_once $_SERVER['DOCUMENT_ROOT']."/MockupsPandora/views/logic/utils/Conexion.php";

class EstudianteControlador{

    //Funcion que registra un nuevo estudiante en base de datos
    public function insertarEstudiante(Usuario $est){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idEstudiante = $est->getId();
        $nombreEstudiante = $est->getNombres();
        $apellidosEstudiante = $est->getApellidos();
        $usuarioEstudiante = $est->getUsername();
        $claveEst = $est->getClave();
        $paisEst = $est->getPais();
        $emailEst = $est->getEmail();
        $rolEst = $est->getRol();

        $sql = "INSERT INTO tbl_usuario (id_usuario, nombres_usuario, apellidos_usuario, username, clave, pais, correo_usuario, id_rol)
                            values ($idEstudiante, '$nombreEstudiante', '$apellidosEstudiante', '$usuarioEstudiante', '$claveEst', '$paisEst', '$emailEst', $rolEst)";

        return $result = mysqli_query($conexion, $sql);
    }

    //Funcion que permite mostrar los datos personales del estudiante
    public function mostrarDatosEstudiante(string $sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Funcion que permite actualizar la informacion de un estudiante en base de datos
    public function actualizarInformacionDeEstudiante(int $idEst, string $usuarioEst, string $correoEst, string $nombresEst, string $apellidosEst, string $direccionEst, string $telefonoEst, string $ciudadEst, string $perfilProf){

        $c = new conectar();
        $conexion = $c->conexion();
                
        $sql = "UPDATE tbl_usuario SET username='$usuarioEst', correo_usuario='$correoEst', nombres_usuario='$nombresEst', apellidos_usuario='$apellidosEst', direccion='$direccionEst', telefono='$telefonoEst', ciudad='$ciudadEst', descripcion='$perfilProf'
                            WHERE  id_usuario=$idEst";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }

    //Funcion que permite consultar el nombre de la foto de perfil de un estudiante
    public function consultarNombreImagenEstudiante(int $idEst){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT foto_usuario from tbl_usuario where id_usuario = $idEst";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['foto_usuario'];
        }
    }

    //Funcion que elimina de base de datos el nombre de la foto de perfil de un estudiante
    public function limpiarNombreImagenEstudiante(int $idEst, string $nombreImgEstudiante){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_usuario SET foto_usuario = null WHERE foto_usuario='$nombreImgEstudiante' and id_usuario=".$idEst;

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    }

    //Funcion que permite eliminar la imagen de perfil de un estudiante
    public function eliminarImagenDePerfilEstudiante(string $nomImg){

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
    public function subirImagenDePerfilEstudiante($rutaImg, $nombreImg, $imgEstudiante, $nomEstudiante){

        $c = new conectar();
        $conexion = $c->conexion();

        //Evaluamos si no existe la carpeta eventosImages
        if(!file_exists('./profileImages')){
            mkdir('./profileImages', 0777, true);

            if(file_exists('./profileImages')){
                if(move_uploaded_file($rutaImg, './profileImages/'. $imgEstudiante)){

                    //Guardamos el nombre de la imagen en la base de datos
                    $queryGuardarNombreImagen = "UPDATE tbl_usuario SET foto_usuario='$nombreImg' WHERE nombres_usuario='$nomEstudiante'";
                    $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

                    //Renombramos la imagen con el nombre guardado en bd 
                    rename("./profileImages/".$imgEstudiante, "./profileImages/".$nombreImg);

                }else{}
            }
        }else{
            if(move_uploaded_file($rutaImg, './profileImages/'. $imgEstudiante)){

               //Guardamos el nombre del archivo del enunciado en la base de datos
               $queryGuardarNombreImagen = "UPDATE tbl_usuario SET foto_usuario='$nombreImg' WHERE nombres_usuario='$nomEstudiante'";
               $resultadoGuardaNombreImagen = mysqli_query($conexion, $queryGuardarNombreImagen);

               //Renombramos el achivo del enunciado con el nombre guardado en bd 
               rename("./profileImages/".$imgEstudiante, "./profileImages/".$nombreImg);

            }else{} 
        } 
    }

    //Funcion que actualiza la contraseña de acceso al sistema de un estudiante
    public function actualizarContraseña(int $idEst, string $nuevaContraseña){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_usuario SET clave = '$nuevaContraseña' WHERE id_usuario=".$idEst;
        $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        return true;
    }

    //Funcion que permite consultar la contraseña que tiene el usuario previamente registrada en el sistema
    public function consultarAntiguaContraseña(string $idEst){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT clave from tbl_usuario where id_usuario = $idEst";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['clave'];
            
        }
    }

    //Funcion que permite consultar el rol de un usuario en el sistema
    public function validarExistenciaDeUsuario(string $user, string $password){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT * from tbl_usuario where username = '$user' and clave = '$password'";
        $result = mysqli_query($conexion, $sql);

        return $result;
    }


    //Funcion que permite consultar el rol de un usuario en el sistema
    public function consultarRolUsuario(string $user){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_rol from tbl_usuario where username = '$user'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['id_rol'];
        }
    }

    //Funcion que permite consultar el id de un usuario con el fin de pasarlo entre lasinterfaces de la plataforma
    public function consultarIdUsuario(string $user){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_usuario from tbl_usuario where username = '$user'";
        $result = mysqli_query($conexion, $sql);

        while ($row = $result->fetch_assoc()) {
            return $row['id_usuario'];
        }
    }

    //Funcion que inicializa el eportafolio deun estudiante dejandolo oculto por defecto
    public function crearEportafolio(string $nombreEst){

        $c = new conectar();
        $conexion = $c->conexion();      
                
        $sql = "UPDATE tbl_usuario SET eportafolioPublicado = 'No' WHERE  nombres_usuario='$nombreEst'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    } 
}
?>