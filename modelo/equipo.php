<?php

class equipo{
    private $tEquipo;
    private $imei;
    private $serial;
    private $nSim;
    private $nCargador;
    private $ciudad;
    private $ehs;
    private $celuweb;
    private $disponible;
    private $cargador;
    private $comodato;
    private $backup;

    public function __construct($tEquipo,$imei,$serial,$nSim,$nCargador,$ciudad,$ehs,$celuweb,$disponible,$cargador,$comodato,$backup){
        $this->tEquipo = $tEquipo;
        $this->imei = $imei;
        $this->serial = $serial;
        $this->nSim = $nSim;
        $this->nCargador = $nCargador;
        $this->ciudad = $ciudad;
        $this->ehs = $ehs;
        $this->celuweb = $celuweb;
        $this->disponible = $disponible;
        $this->cargador = $cargador;
        $this->comodato = $comodato;
        $this->backup = $backup;
    }
    public function GetTEquipo(){
        return $this->tEquipo;
    }
    public function SetTEquipo($tEquipo){
        $this->tEquipo = $tEquipo;
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
    public function GetnCargador(){
        return $this->nCargador;
    }
    public function SetnCargados($nCargador){
        $this->nCargador = $nCargador;
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
    public function GetBackup(){
        return $this->backup;
    }
    public function SetImpresora($backup){
        $this->backup = $backup;
    }

}