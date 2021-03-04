<?php

class envioMantenimiento{
    private $tipoEquipo;
    private $imei;
    private $serial;
    private $sedeE;
    private $fechaE;
    private $empresa;
    private $ruta;
    private $responsableE;
    private $observaciones;

    public function __construct($tipoEquipo, $imei, $serial, $sedeE, $fechaE, $empresa, $ruta, $responsable, $observaciones){
        $this->tipoEquipo = $tipoEquipo;
        $this->imei = $imei;
        $this->serial = $serial;
        $this->sedeE = $sedeE;
        $this->fechaE = $fechaE;
        $this->empresa = $empresa;
        $this->ruta = $ruta;
        $this->responsable = $responsable;
        $this->observaciones = $observaciones;
    }

    public function GetTipoEquipo(){
        return $this->tipoEquipo;
    }
    public function SetTipoEquipo($tipoEquipo){
        $this->tipoEquipo = $tipoEquipo;
    }
    public function GetImei(){
        return $this->imei;
    }
    public function SetImei($imei){
        $this->imei = $imei;
    }
    public function GetSerial(){
        return $this->serial;
    }
    public function SetSerial($serial){
        $this->serial = $serial;
    }
    public function GetSedeE(){
        return $this->sedeE;
    }
    public function SetSedeE($sedeE){
        $this->sedeE=$sedeE;
    }
    public function GetFechaE(){
        return $this->fechaE;
    }
    public function SetFechaE($fechaE){
        $this->fechaE = $fechaE;
    }
    public function GetEmpresa(){
        return $this->empresa;
    }
    public function SetEmpresa($empresa){
        $this->empresa = $empresa;
    }
    public function GetRuta(){
        return $this->ruta;
    }
    public function SetRuta($ruta){
        $this->ruta = $ruta;
    }
    public function GetResponsableE(){
        return $this->responsableE;
    }
    public function SetResponsableE($responsableE){
        $this->responsableE = $responsableE;
    }
    public function GetObservaciones(){
        return $this->observaciones;
    }
    public function SetObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
}