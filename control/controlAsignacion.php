<?php
require_once 'modelo/asignacion.php';

class controlAsignacion{
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

    public function registroAsignacion($asignacion){
        try{
            $sql = 'Insert Into asignacion (nroComodato, imei, serial, nombreR, cedula, ruta, observaciones) values (?, ?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $asignacion->GetNroComodato(),
                $asignacion->GetImei(),
                $asignacion->GetSerial(),
                $asignacion->GetNombre(),
                $asignacion->GetCedula(),
                $asignacion->GetRuta(),
                $asignacion->GetObservaciones()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function consultaAsignados(){
        try{
            $sql = 'SELECT nroComodato, imei, serial, nombreR, cedula, ruta FROM asignacion';
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $asignados = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $asignados;
    }
    
}