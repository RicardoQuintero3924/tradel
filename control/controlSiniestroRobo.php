<?php

require_once 'modelo/siniestroRobo.php';

class controlSiniestroRobo{
    private $cnx;

    public function __construct(){
        require_once 'conexion/Db.php';
        try{
            $this->cnx = Db::conectar();
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function registroSiniestro($siniestro){
        try{
            $sql = 'Insert Into siniestro (tipo_equipo, imei, serial, fecha, responsable, ruta, nroDenuncio) values (?, ?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
               $siniestro->GetTipoEquipo(),
               $siniestro->GetImei(),
               $siniestro->GetSerial(),
               $siniestro->GetFecha(),
               $siniestro->GetResponsable(),
               $siniestro->GetRuta(),
               $siniestro->GetNroDenuncio()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
    
}