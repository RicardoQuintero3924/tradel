<?php

class PrefijoComodato{
    private $prefijo;


    public function __construct($prefijo){
        $this->prefijo = $prefijo;
    }
    
    public function GetPrefijo(){
        return $this->prefjo;
    }
    public function SetPrefijo($prefijo){
        $this->prefijo = $prefijo;
    }


}