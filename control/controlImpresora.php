<?php
require_once 'modelo/mImpresora.php';

class controlImpresora{
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
    public function registroImpresora($impresora){
        try{
            $sql= 'Insert Into impresora (tipo_impresora, serial, estado, observaciones) values (?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $impresora->GetTImpresora(),
                $impresora->GetSerial(),
                $impresora->Getestado(),
                $impresora->GetObservaciones()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
    
}