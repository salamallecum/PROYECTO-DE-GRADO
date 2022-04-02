<?php

class DesafioPersonalizado{

    private $id;
    private $idEstudiante;
    private $nombre;
    private $descripcion;
    private $fechaDePropuesta;
    private $idDesafioASustituir;
    private $estado;
    

    //Constructor
    function __construct($id, $idEstudiante, $nombre, $descripcion, $fechaDePropuesta, $idDesafioASustituir, $estado)
    {
        $this->id = $id;
        $this->idEstudiante = $idEstudiante;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaDePropuesta = $fechaDePropuesta;
        $this->idDesafioASustituir = $idDesafioASustituir;
        $this->estado = $estado;
    }
    
    //GETTER Y SETTER
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setIdEstudiante($idEst){
        $this->idEstudiante = $idEst;
    }

    public function getIdEstudiante(){
        return $this->idEstudiante;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setFechaPropuesta($fechaProp){
        $this->fechaDePropuesta = $fechaProp;
    }

    public function getFechaPropuesta(){
        return $this->fechaDePropuesta;
    }

    public function setIdDesafioASustituir($idDes){
        $this->idDesafioASustituir = $idDes;
    }

    public function getIIdDesafioASustituir(){
        return $this->idDesafioASustituir;
    }

    public function setEstado($est){
        $this->estado = $est;
    }

    public function getEstado(){
        return $this->estado;
    }
}

?>