<?php

class SiniestroRobo{

    private $tipoEquipo;
    private $imei;
    private $serial;
    private $fecha;
    private $responsable;
    private $ruta;
    private $nroDenuncio;


    public function __construct($tipoEquipo, $imei, $serial, $fecha, $responsable, $ruta, $nroDenuncio){
        $this->tipoEquipo = $tipoEquipo;
        $this->imei = $imei;
        $this->serial = $serial;
        $this->fecha = $fecha;
        $this->responsable = $responsable;
        $this->ruta = $ruta;
        $this->nroDenuncio = $nroDenuncio;
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
    public function GetFecha(){
        return $this->fecha;
    }
    public function SetFecha($fecha){
        $this->fecha = $fecha;
    }
    public function GetResponsable(){
        return $this->responsable;
    }
    public function SetResponsable($responsable){
        $this->responsable = $responsable;
    }
    public function GetRuta(){
        return $this->ruta;
    }
    public function SetRuta($ruta){
        $this->ruta = $ruta;
    }
    public function GetNroDenuncio(){
        return $this->nroDenuncio;
    }
    public function SetNroDenuncio($nroDenuncio){
        $this->nroDenuncio = $nroDenuncio;
    }
}