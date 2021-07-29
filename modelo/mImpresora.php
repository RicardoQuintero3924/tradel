<?php

class impresora{
    private $tImpresora;
    private $serial;
    private $estado;
    private $ciudad;
    private $disponible;
    private $observaciones;

    public function __construct($tImpresora, $serial, $estado, $ciudad, $disponible, $observaciones){
        $this->tImpresora = $tImpresora;
        $this->serial = $serial;
        $this->estado = $estado;
        $this->ciudad = $ciudad;
        $this->disponible = $disponible;
        $this->observaciones = $observaciones;
    }

    public function GetTImpresora(){
        return $this->tImpresora;
    }
    public function SetTImpresora($tImpresora){
        $this->tImpresora = $tImpresora;
    }
    public function GetSerial(){
        return $this->serial;
    }
    public function SetSerial($serial){
        $this->serial = $serial;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
    public function GetCiudad(){
        return $this->ciudad;
    }
    public function SetCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    public function GetDisponible(){
        return $this->disponible;
    }
    public function SetDisponible($disponible){
        $this->disponible = $disponible;
    }
    public function GetObservaciones(){
        return $this->observaciones;
    }
    public function SetObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
}