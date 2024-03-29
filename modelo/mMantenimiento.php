<?php

class Mantenimiento{
    private $imei;
    private $tequipo;
    private $costo;
    private $caso;
    private $estado;
    private $descripcion;
    private $nroFactura;

    public function __construct($imei, $tequipo ,$costo, $caso, $estado, $descripcion, $nroFactura
    ){
        $this->imei = $imei;
        $this->tequipo = $tequipo;
        $this->costo = $costo;
        $this->caso = $caso;
        $this->estado = $estado;
        $this->descripcion = $descripcion; 
        $this->nroFactura = $nroFactura;
    }

    public function GetImei(){
        return $this->imei;
    }
    public function SetImei($imei){
        $this->imei = $imei;
    }
    public function GetTEquipo(){
        return $this->tequipo;
    }
    public function SetTEquipo($tequipo){
        $this->tequipo = $tequipo;
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
    public function GetNroFactura(){
        return $this->nroFactura;
    }
    public function SetNroFactura($nroFactura){
        $this->nroFactura = $nroFactura;
    }


}