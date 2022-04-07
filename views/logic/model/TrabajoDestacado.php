<?php

class TrabajoDestacado{

    private $id;
    private $idDelEstudiante;
    private $nombre;
    private $descripcion;
    private $nombreImagen;
    private $linkDocumento;
    private $linkVideo;
    private $linkrepoCodigo;
    private $linkPresentacion;
    private $trabajoFueAplicadoAActividad;
    private $trabajoTieneBadge;
    private $publicadoEnEportafolio;

    //Constructor
    function __construct($id, $idDelEstudiante, $nombre, $descripcion, $trabajoTieneBadge, $trabajoFueAplicadoAActividad, $publicadoEnEportafolio)
    {
        $this->id = $id;
        $this->idDelEstudiante = $idDelEstudiante;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->trabajoTieneBadge = $trabajoTieneBadge;
        $this->trabajoFueAplicadoAActividad = $trabajoFueAplicadoAActividad;
        $this->publicadoEnEportafolio = $publicadoEnEportafolio;
        
    }
    
    //GETTER Y SETTER
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setIdDelEstudiante($idEst){
        $this->idDelEstudiante = $idEst;
    }

    public function getIdDelEstudiante(){
        return $this->idDelEstudiante;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setDescripcion($desc){
        $this->descripcion = $desc;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setTrabajoTieneBadge($trabTieneBadg){
        $this->trabajoTieneBadge = $trabTieneBadg;
    }

    public function getTrabajoTieneBadge(){
        return $this->trabajoTieneBadge;
    }

    public function setTrabajoAplicadoActividad($aplicAct){
        $this->trabajoFueAplicadoAActividad = $aplicAct;
    }

    public function getTrabajoAplicadoActividad(){
        return $this->trabajoFueAplicadoAActividad;
    }

    public function setPublicadoEnEportafolio($publicadoEnEp){
        $this->publicadoEnEportafolio = $publicadoEnEp;
    }

    public function getPublicadoEnEportafolio(){
        return $this->publicadoEnEportafolio;
    }
    
}

?>