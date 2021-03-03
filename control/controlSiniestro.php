<?php
require_once 'modelo/siniestro.php';


class controlSiniestro{
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
            $sql = 'Insert Into siniestro (tipo_equipo, tipo_siniestro, imei, serial, fecha, empresa, ruta, nombre) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $siniestro->GetTipoEquipo(),
                $siniestro->GetTipoSiniestro(),
                $siniestro->GetImei(),
                $siniestro->GetSerial(),
                $siniestro->GetfSiniestro(),
                $siniestro->GetEmpresa(),
                $siniestro->GetRuta(),
                $siniestro->GetNombre()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
            var_dump($ex);
        }
    }
}