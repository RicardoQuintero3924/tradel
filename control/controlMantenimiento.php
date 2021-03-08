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
            $sql = 'Insert into mantenimiento (imei, costo, caso, estado, descripcion) values (?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $mantenimiento->GetImei(),
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

    public function consultaImei(){
        try{
            $sql = 'SELECT imei FROM enviomt';
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $imeis= $prep->fetchAll(PDO::FETCH_OBJ);   
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $imeis;
    }
}