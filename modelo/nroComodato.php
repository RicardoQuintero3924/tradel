<?php
class NroComodato{
    private $prefijo;
    private $consecutivo;

    public function __construct($consecutivo, $prefijo){
        $this->consecutivo = $consecutivo;
        $this->prefijo = $prefijo;
    }
    public function GetPrefijo(){
        return $this->prefijo;
    }
    public function SetPrefijo($prefijo){
        $this->prefijo = $prefijo;
    }
    public function GetConsecutivo(){
        return $this->consecutivo;
    }
    public function SetConsecutivo($consecutivo){
        $this->consecutivo = $consecutivo;
    }
}