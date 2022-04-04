<?php

class Desafio{

    private $id;
    private $idProfeEncargado;
    private $nombre;
    private $descripcion;
    private $fechaInicio;
    private $fechaFin;
    private $nombreImagen;
    private $nombreEnunciado;
    private $materiaDeContribucion;
    private $estadoDelDesafio;

    //Constructor
    function __construct($id, $idProfeEncargado, $nombre, $descripcion, $fechaInicio, $fechaFin, $materiaDeContribucion, $estadoDelDesafio)
    {
        $this->id = $id;
        $this->idProfeEncargado = $idProfeEncargado;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->materiaDeContribucion = $materiaDeContribucion;
        $this->estadoDelDesafio = $estadoDelDesafio;
    }
    
    //GETTER Y SETTER
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setIdProfeEncargado($idProf){
        $this->idProfeEncargado = $idProf;
    }

    public function getIdProfeEncargado(){
        return $this->idProfeEncargado;
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

    public function setMateriaDeContribucion($materiaDeContrib){
        $this->materiaDeContribucion = $materiaDeContrib;
    }

    public function getMateriaDeContribucion(){
        return $this->materiaDeContribucion;
    }

    public function setEstadoDelDesafio($estDesaf){
        $this->estadoDelDesafio = $estDesaf;
    }

    public function getEstadoDelDesafio(){
        return $this->estadoDelDesafio;
    }
}

?>