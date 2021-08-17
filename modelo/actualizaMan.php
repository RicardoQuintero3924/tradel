<?php
class ActualizaMan{

    private $estado;
    private $imei;

    public function __construct($estado, $imei)
    {
        $this->estado = $estado;
        $this->imei = $imei;
    }

    public function GetEstado(){
        return $this->estado;
    }
    public function SetEstado($estado){
        $this->estado = $estado;
    }
    public function GetImei(){
        return $this->imei;
    }
    public function SetImei($imei){
        $this->imei = $imei;
    }
}