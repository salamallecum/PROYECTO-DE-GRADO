<?php

class Materia{

    private $id;
    private $nombre;
    private $codigo;
    private $semestre;
    private $tipo;
    private $jornada;
    private $grupo;
    private $profeEncargado;


    //Constructor
    public function __construct($id, $nombre, $codigo, $semestre, $tipo, $jornada, $grupo, $profeEncargado)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->semestre = $semestre;
        $this->tipo = $tipo;
        $this->jornada = $jornada;
        $this->grupo = $grupo;
        $this->profeEncargado = $profeEncargado;

    }
    
    //GETTER Y SETTER
    public function setId(int $ide){
        $this->id = $ide;
    }

    public function getId():int{
        return $this->id;
    }

    public function setNombre(string $nom){
        $this->nombre = $nom;
    }

    public function getNombre():string{
        return $this->nombre;
    }

    public function setCodigo(string $cod){
        $this->codigo = $cod;
    }

    public function getCodigo():string{
        return $this->codigo;
    }

    public function setSemestre(string $sem){
        $this->semestre = $sem;
    }

    public function getSemestre():string{
        return $this->semestre;
    }

    public function setTipo(string $tip){
        $this->tipo = $tip;
    }

    public function getTipo():string{
        return $this->tipo;
    }

    public function setJornada($jorn){
        $this->jornada = $jorn;
    }

    public function getJornada():string{
        return $this->jornada;
    }

    public function setGrupo($grup){
        $this->grupo = $grup;
    }

    public function getGrupo():string{
        return $this->grupo;
    }

    public function setProfeEncargado(int $profeEnc){
        $this->profeEncargado = $profeEnc;
    }

    public function getProfeEncargado():int{
        return $this->profeEncargado;
    }
}

?>