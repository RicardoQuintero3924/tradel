<?php

class usuario{
    private $id;
    private $nombre;
    private $usuario;
    private $contraseña;

    public function __construct($id,$nombre, $usuario, $contraseña)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
    }
    public function GetId(){
        return $this->id;
    }
    public function SetId($id){
        $this->id = $id;
    }

    public function GetNombre(){
        return $this->nombre;
    }
    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetUsuario(){
        return $this->usuario;
    }
    public function SetUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function GetContraseña(){
        return $this->contraseña;
    }
    public function SetContraseña($contraseña){
        $this->contraseña = $contraseña;
    }



}