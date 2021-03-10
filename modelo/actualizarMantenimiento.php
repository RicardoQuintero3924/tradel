<?php
class actualizarMantenimiento{

    private $nroFactura;
    private $estado;
    private $descripcion;
    private $caso;

    public function __construct($nroFactura, $estado, $descripcion, $caso)
    {
        $this->nroFactura = $nroFactura;
        $this->estado = $estado;
        $this->descripcion = $descripcion;
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
    public function GetCaso(){
        return $this->caso;
    }
    public function SetCaso($caso){
        $this->caso = $caso;
    }
}