<?php
class actualizaEDisponible {

    private $disponible;
    private $imei;

    public function __construct($disponible, $imei)
    {
        $this->disponible = $disponible;
        $this->imei = $imei;
    }

    public function GetDisponible(){
        return $this->disponible;
    }
    public function SetDisponible($disponible){
        $this->disponible = $disponible;
    }
    public function GetImei(){
        return $this->imei;
    }
    public function SetImei($imei){
        $this->imei = $imei;
    }
}