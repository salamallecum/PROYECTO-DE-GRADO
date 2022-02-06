<?php

class CompetenciaGeneral{

    private $id;
    private $codigo;
    private $nombre;
    private $rolDeContribucion;
    private $nomBadgOro;
    private $nomBadgPlata;
    private $nomBadgBronce;
    

    //Constructor
    function __construct($id, $codigo, $nombre, $rolDeContribucion)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->rolDeContribucion = $rolDeContribucion;       
    }
    
    //GETTER Y SETTER
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setCodigo($cod){
        $this->codigo = $cod;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setRolContribucion($rol){
        $this->rolDeContribucion = $rol;
    }

    public function getRolContribucion(){
        return $this->rolDeContribucion;
    }

    public function setNombreBadgeOro($bdgoro){
        $this->nomBadgOro = $bdgoro;
    }

    public function getNombreBadgeOro(){
        return $this->nomBadgOro;
    }

    public function setNombreBadgePlata($bdgplata){
        $this->nomBadgPlata = $bdgplata;
    }

    public function getNombreBadgePlata(){
        return $this->nomBadgPlata;
    }

    public function setNombreBadgeBronce($bdgbronc){
        $this->nomBadgBronce = $bdgbronc;
    }

    public function getNombreBadgeBronce(){
        return $this->nomBadgBronce;
    }

}

?>