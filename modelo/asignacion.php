<?php

    class asignacion{
        private $nroComodato;
        private $imei;
        private $serial;
        private $nombre;
        private $cedula;
        private $ruta;
        private $activo;
        private $observaciones;


        public function __construct($nroComodato, $imei, $serial, $nombre, $cedula, $ruta, $activo, $observaciones){
            $this->nroComodato = $nroComodato;
            $this->imei = $imei;
            $this->serial = $serial;
            $this->nombre = $nombre;
            $this->cedula = $cedula;
            $this->ruta = $ruta;
            $this->activo = $activo;
            $this->observaciones = $observaciones;
        }

        public function GetNroComodato(){
            return $this->nroComodato;
        }
        public function SetNroComodato($nroComodato){
            $this->nroComodato = $nroComodato;
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
        public function GetNombre(){
            return $this->nombre;
        }
        public function SetNombre($nombre){
            $this->nombre = $nombre;
        }
        public function GetCedula(){
            return $this->cedula;
        }
        public function SetCedula($cedula){
            $this->cedula = $cedula;
        }
        public function GetRuta(){
            return $this->ruta;
        }
        public function SetRuta($ruta){
            $this->ruta = $ruta;
        }
        public function GetActivo(){
            return $this->activo;
        }
        public function SetActivo($activo){
            $this->activo = $activo;
        }
        public function GetObservaciones(){
            return $this->observaciones;
        }
        public function SetObservaciones($observaciones){
            $this->observaciones = $observaciones;
        }
    

    }