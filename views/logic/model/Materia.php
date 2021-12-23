<?php

class Materia{

    private $id;
    private $nombre;
    private $codigo;
    private $semestre;
    private $tipo;
    private $jornada;
    private $profeEncargado;

    //Constructor
    public function __construct($id, $nombre, $codigo, $semestre, $tipo, $jornada, $profeEncargado)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->semestre = $semestre;
        $this->tipo = $tipo;
        $this->jornada = $jornada;
        $this->profeEncargado = $profeEncargado;
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

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setSemestre($semestre){
        $this->semestre = $semestre;
    }

    public function getSemestre(){
        return $this->semestre;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setJornada($jornada){
        $this->jornada = $jornada;
    }

    public function getJornada(){
        return $this->jornada;
    }

    public function setProfeEncargado($profeEncargado){
        $this->profeEncargado = $profeEncargado;
    }

    public function getProfeEncargado(){
        return $this->profeEncargado;
    }
}

?>