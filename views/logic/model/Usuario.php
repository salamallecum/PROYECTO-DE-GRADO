<?php

class Usuario{

    private $id;
    private $nombres;
    private $apellidos;
    private $username;
    private $clave;
    private $pais;
    private $email;
    private $rol;

    //Constructor
    public function __construct($id, $nombres, $apellidos, $username, $clave, $pais, $email, $rol)
    {
        $this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->username = $username;
        $this->clave = $clave;
        $this->pais = $pais;
        $this->email = $email;
        $this->rol = $rol;
    }
    
    //GETTER Y SETTER
    public function setId(int $ide){
        $this->id = $ide;
    }

    public function getId():int{
        return $this->id;
    }

    public function setNombres(string $nom){
        $this->nombres = $nom;
    }

    public function getNombres():string{
        return $this->nombres;
    }

    public function setApellidos(string $ape){
        $this->apellidos = $ape;
    }

    public function getApellidos():string{
        return $this->apellidos;
    }

    public function setUsername(string $user){
        $this->username = $user;
    }

    public function getUsername():string{
        return $this->username;
    }

    public function setClave(string $clav){
        $this->clave = $clav;
    }

    public function getClave():string{
        return $this->clave;
    }

    public function setPais($pai){
        $this->pais = $pai;
    }

    public function getPais():string{
        return $this->pais;
    }

    public function setEmail(string $ema){
        $this->email = $ema;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setRol(int $ro){
        $this->rol = $ro;
    }

    public function getRol():int{
        return $this->rol;
    }
}

?>