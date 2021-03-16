<?php
class tipoEquipo{
    private $tipoEquipo;


    public function __construct($tipoEquipo)
    {
        $this->tipoEquipo = $tipoEquipo;
    }

    public function GetTipoEquipo(){
        return $this->tipoEquipo;
    }
    public function SetTipoEquipo($tipoEquipo){
        $this->tipoEquipo = $tipoEquipo;
    }
    
}