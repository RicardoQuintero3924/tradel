<?php
require_once 'modelo/mReporteSura.php';

class controlReporte{
    private $cnx;
    public function __construct(){
        require_once 'conexion/Db.php';
        try{
            $this->cnx = Db::conectar();
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function RegistroReporte($reporte){
        try{
            $sql = 'Insert into reportes(tipoR, reporte, cobrado, pagadoA, denuncia, observaciones) values (?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $reporte->GetTipoR(),
                $reporte->GetReporteN(),
                $reporte->GetCobrado(),
                $reporte->GetPagado(),
                $reporte->GetDenuncia(),
                $reporte->GetObservacion()
            ]);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    
}
