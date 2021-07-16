<?php
class actualizaIDisponible {

    private $disponible;
    private $serial;

    public function __construct($disponible, $serial)
    {
        $this->disponible = $disponible;
        $this->serial = $serial;
    }
    public function GetDisponible(){
        return $this->disponible;
    }
    public function SetDisponible($disponible){
        $this->disponible = $disponible;
    }
    public function GetSerial(){
        return $this->serial;
    }
    public function SetSerial($serial){
        $this->serial = $serial;
    }
}