<?php

class Mantenimiento{
    private $imei;
    private $costo;
    private $caso;
    private $estado;
    private $descripcion;

    public function __construct($imei ,$costo, $caso, $estado, $descripcion){
        $this->imei = $imei;
        $this->costo = $costo;
        $this->caso = $caso;
        $this->estado = $estado;
        $this->descripcion = $descripcion; 
    }

    public function GetImei(){
        return $this->imei;
    }
    public function SetImei($imei){
        $this->imei = $imei;
    }
    public function GetCosto(){
        return $this->costo;
    }
    public function SetCosto($costo){
        $this->costo= $costo;
    }
    public function GetCaso(){
        return $this->caso;
    }
    public function SetCaso($caso){
        $this->caso = $caso;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
    public function GetDescripcion(){
        return $this->descripcion;
    }
    public function SetDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }


}