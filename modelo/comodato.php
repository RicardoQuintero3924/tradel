<?php

class comodato{
    private $nComodato;
    private $imeiEquipo;
    private $serialImpresora;
    private $estado;
    private $vigencia;
    private $observaciones;

    public function __construct($nComodato, $imeiEquipo, $serialImpresora, $estado, $vigencia, $observaciones){
        $this->nComodato = $nComodato;
        $this->imeiEquipo = $imeiEquipo;
        $this->serialImpresora = $serialImpresora;
        $this->vigencia = $vigencia;
        $this->observaciones = $observaciones;
    }

    public function GetNComodato(){
        return $this->nComodato;
    }
    public function SetNComodato($nComodato){
        $this->nComodato = $nComodato;
    }
    public function GetImeiEquipo(){
        return $this->imeiEquipo;
    }
    public function SetImeiEquipo($imeiEquipo){
        $this->imeiEquipo = $imeiEquipo;
    }
    public function GetSerialImpresora(){
        return $this->serialImpresora;
    }
    public function SetSerialImpresora($serialImpresora){
        $this->serialImpresora = $serialImpresora;
    }
    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
    public function GetVigencia(){
        return $this->vigencia;
    }
    public function SetVigencia($vigencia){
        $this->vigencia = $vigencia;
    }
    public function GetObservaciones(){
        return $this->observaciones;
    }
    public function SetObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
}