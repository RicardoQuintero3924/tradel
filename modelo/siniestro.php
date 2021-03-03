<?php

class siniestro
{
    private $tipoEquipo;
    private $tipoSiniestro;
    private $imei;
    private $serial;
    private $fsiniestro;
    private $empresa;
    private $ruta;
    private $nombre;

    public function __construct($tipoEquipo, $tipoSiniestro, $imei, $serial, $fsiniestro, $empresa, $ruta, $nombre)
    {
        $this->$tipoEquipo = $tipoEquipo;
        $this->$tipoSiniestro = $tipoSiniestro;
        $this->$imei = $imei;
        $this->$serial = $serial;
        $this->$fsiniestro = $fsiniestro;
        $this->$empresa = $empresa;
        $this->$ruta = $ruta;
        $this->$nombre = $nombre;
    }

    public function GetTipoEquipo()
    {
        return $this->tipoEquipo;
    }
    public function SetTipoEquipo($tipoEquipo)
    {
        $this->tipoEquipo = $tipoEquipo;
    }
    public function GetTipoSiniestro()
    {
        return $this->tipoSiniestro;
    }
    public function SetTipoSiniestro($tipoSiniestro)
    {
        $this->tipoSiniestro = $tipoSiniestro;
    }
    public function GetImei()
    {
        return $this->imei;
    }
    public function SetImei($imei)
    {
        $this->imei = $imei;
    }
    public function GetSerial()
    {
        return $this->serial;
    }
    public function SetSerial($serial)
    {
        $this->serial = $serial;
    }
    public function GetfSiniestro()
    {
        return $this->fsiniestro;
    }
    public function SetfSiniestro($fsiniestro)
    {
        $this->fsiniestro = $fsiniestro;
    }
    public function GetEmpresa()
    {
        return $this->empresa;
    }
    public function SetEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    public function GetRuta()
    {
        return $this->ruta;
    }
    public function SetRuta($ruta)
    {
        $this->ruta = $ruta;
    }
    public function GetNombre()
    {
        return $this->nombre;
    }
    public function SetNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
