<?php

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
}

?>