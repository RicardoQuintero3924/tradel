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
            $sql = 'Insert into mantenimiento (imei, costo, caso, estado, descripcion, nroFactura) values (?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $mantenimiento->GetImei(),
                $mantenimiento->GetCosto(),
                $mantenimiento->GetCaso(),
                $mantenimiento->GetEstado(),
                $mantenimiento->GetDescripcion(),
                $mantenimiento->GetNroFactura()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function consultaImei(){
        try{
            $sql = "SELECT imei FROM enviomt WHERE estado = 1";
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $imeis= $prep->fetchAll(PDO::FETCH_OBJ);   
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $imeis;
    }
    public function consultaCasos(){
        try{
            $sql= "SELECT caso FROM mantenimiento WHERE estado ='enviado'" ;
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $casos = $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $casos;
    }
    public function consultaCaso($caso){
        try{
            $sql = 'select * from mantenimiento where caso = ?';
            $prep = $this->cnx->prepare($sql);
            $prep-> execute([$caso]);
            $info = $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $info;
    }
    public function actualizarMantenimiento($actualizacion){
        try{
            $sql = "UPDATE mantenimiento SET nroFactura = ?, estado = ?, descripcion = ? WHERE caso = ?";
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $actualizacion->GetNroFactura(),
                $actualizacion->GetEstado(),
                $actualizacion->GetDescripcion(),
                $actualizacion->GetCaso()
            ]);
            return true;
        }catch(PDOException $ex){
            die($ex->getMessage());
            return false;
        }
    }
    public function consultaSoportes(){
        try{
            $sql='SELECT imei, caso, costo, estado FROM mantenimiento';
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $casos = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $casos;
    }
}