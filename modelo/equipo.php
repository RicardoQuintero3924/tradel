<?php

class equipo{
    private $tEquipo;
    private $imei;
    private $serial;
    private $nSim;
    private $ciudad;
    private $ehs;
    private $celuweb;
    private $disponible;
    private $cargador;
    private $comodato;
    private $impresora;

    public function __construct($tEquipo,$imei,$serial,$nSim,$ciudad,$ehs,$celuweb,$disponible,$cargador,$comodato,$impresora){
        $this->tEquipo = $tEquipo;
        $this->imei = $imei;
        $this->serial = $serial;
        $this->nSim = $nSim;
        $this->ciudad = $ciudad;
        $this->ehs = $ehs;
        $this->celuweb = $celuweb;
        $this->disponible = $disponible;
        $this->cargador = $cargador;
        $this->comodato = $comodato;
        $this->impresora = $impresora;
    }
    public function GetTEquipo(){
        return $this->tEquipo;
    }
    public function SetTEquipo($tEquipo){
        $this->tQuipo = $tEquipo;
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
    public function GetNSim(){
        return $this->nSim;
    }
    public function SetNSim($nSim){
        $this->nSim = $nSim;
    }  
    public function GetCiudad(){
        return $this->ciudad;
    }
    public function SetCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    public function GetEhs(){
        return $this->ehs;
    }
    public function SetEhs($ehs){
        $this->ehs = $ehs;
    }
    public function GetCeluweb(){
        return $this->celuweb;
    }
    public function SetCeluweb($celuweb){
        $this->celuweb = $celuweb;
    }
    public function GetDisponible(){
        return $this->disponible;
    }
    public function SetDisponible($disponible){
        $this->disponible = $disponible;
    }
    public function GetCargador(){
        return $this->cargador;
    }
    public function SetCargador($cargador){
        $this->cargador = $cargador;
    }
    public function GetComodato(){
        return $this->comodato;
    }
    public function SetComodato($comodato){
        $this->comodato = $comodato;
    }
    public function GetImpresora(){
        return $this->impresora;
    }
    public function SetImpresora($impresora){
        $this->impresora = $impresora;
    }

}