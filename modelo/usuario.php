<?php

class usuario{
    
    private $nombre;
    private $usuario;
    private $contraseña;
    private $tipoUsuario;

    public function __construct($nombre, $usuario, $contraseña, $tipoUsuario)
    {
        
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->tipoUsuario = $tipoUsuario;
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
    public function GetTipoUsuario(){
        return $this->tipoUsuario;
    } 
    public function SetTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }


}