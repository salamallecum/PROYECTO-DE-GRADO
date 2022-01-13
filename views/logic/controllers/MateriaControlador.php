<?php

class MateriaControlador{

    //Funcion que permite la creación de materias
    public function insertarMateria(Materia $materia){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idMateria = $materia->getId();
        $nombreMateria = $materia->getNombre();
        $codigoMateria = $materia->getCodigo();
        $semestreMateria = $materia->getSemestre();
        $tipoMat = $materia->getTipo();
        $jornadaMateria = $materia->getJornada();
                
        $sql = "INSERT INTO tbl_asignatura (id_asignatura, nombre_asignatura, codigo, semestre, tipo, jornada)
                            values ($idMateria, '$nombreMateria', '$codigoMateria', '$semestreMateria', '$tipoMat', '$jornadaMateria')";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)) ;
    }

    //Funcion que muestra el listado de materias registradas en base de datos
    public function mostrarMateriasRegistradas($sql){

        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    //Funcion que permite la asignación de materias
    public function asignarMateria($idmate, $idProf){

        $c = new conectar();
        $conexion = $c->conexion();

        //Capturamos los datos del objeto
        $idMateria = $idmate;
        $idProfesor = $idProf;

        $sql = "UPDATE tbl_asignatura SET id_profesor='$idProfesor' where id_asignatura='$idMateria'";

        return $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

    }
}

?>