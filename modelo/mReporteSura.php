<?php 

class ReporteSura{
    private $tipoR;
    private $reporteN;
    private $cobrado;
    private $pagado;
    private $denuncia;
    private $observacion;

    public function __construct($tipoR, $reporteN, $cobrado, $pagado, $denuncia, $observacion){
        $this->tipoR = $tipoR;
        $this->reporteN = $reporteN;
        $this->cobrado = $cobrado;
        $this->pagado = $pagado;
        $this->denuncia = $denuncia;
        $this->observacion = $observacion;
    }

    public function GetTipoR(){
        return $this->tipoR;
    }
    public function SetTipoR($tipoR){
        $this->tipoR = $tipoR;
    }

    public function GetReporteN(){
        return $this->reporteN;
    }

    public function SetReporteN($reporteN){
        $this->reporteN = $reporteN;
    }

    public function GetCobrado(){
       return $this->cobrado;
    }

    public function SetCobrado($cobrado){
        $this->cobrado = $cobrado;
    }

    public function GetPagado(){
        return $this->pagado;
    }

    public function SetPagado($pagado){
        $this->pagado = $pagado;
    }

    public function GetDenuncia(){
        return $this->denuncia;
    } 

    public function SetDenuncia($denuncia){
        $this->denuncia = $denuncia;
    }

    public function GetObservacion(){
        return $this->observacion;
    }

    public function SetObservacion($observacion){
        $this->observacion = $observacion;
    }



}