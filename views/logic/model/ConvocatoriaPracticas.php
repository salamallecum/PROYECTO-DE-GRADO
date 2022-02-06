<?php

class ConvocatoriaPracticas{

    private $id;
    private $nombre;
    private $descripcion;
    private $fechaInicio;
    private $fechaFin;
    private $nombreImagen;
    private $nombreEnunciado;

    //Constructor
    function __construct($id, $nombre, $descripcion, $fechaInicio, $fechaFin)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }
    
    //GETTER Y SETTER
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
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

    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function setFechaFin($fechaFin){
        $this->fechaFin = $fechaFin;
    }

    public function getFechaFin(){
        return $this->fechaFin;
    }

    public function setNombreImagen($nombreImagen){
        $this->nombreImagen = $nombreImagen;
    }

    public function getNombreImagen(){
        return $this->nombreImagen;
    }

    public function setNombreEnunciado($nombreEnunciado){
        $this->nombreEnunciado = $nombreEnunciado;
    }

    public function getNombreEnunciado(){
        return $this->nombreEnunciado;
    }
}

?>