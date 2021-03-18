<?php
require_once 'modelo/envioMantenimientoM.php';

Class ControlEnvioMantenimiento{
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
    public function registroEnvioMantenimiento($mantenimiento){
        try{
            $sql = 'insert into enviomt (tipo_equipo, imei, serial, sedeE, fecha, empresa, ruta, responsable, descripcion, estado) values (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $mantenimiento->GetTipoEquipo(),
                $mantenimiento->GetImei(),
                $mantenimiento->GetSerial(),
                $mantenimiento->GetSedeE(),
                $mantenimiento->GetFechaE(),
                $mantenimiento->GetEmpresa(),
                $mantenimiento->GetRuta(),
                $mantenimiento->GetResponsableE(),
                $mantenimiento->GetObservaciones()
            ]);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

}