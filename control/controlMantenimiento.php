<?php
class controlMantenimiento{
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

    public function registroMantenimiento($mantenimiento){
        try{
            $sql = 'Insert into mantenimiento (imei, fEnvio, costo, caso, estado, descripcion) values (?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $mantenimiento->GetImei(),
                $mantenimiento->GetFEnvio(),
                $mantenimiento->GetCosto(),
                $mantenimiento->GetCaso(),
                $mantenimiento->GetEstado(),
                $mantenimiento->GetDescripcion()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
}