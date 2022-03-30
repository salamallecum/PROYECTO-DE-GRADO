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
    public function actualizarInformacionDeProfesor(string $idProf, string $usuarioProf, string $correoProf, string $nombresProf, string $apellidosProf, string $direccionProf, string $telefonoProf, string $ciudadProfe, string $perfilProf){


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

}

?>