<?php
require_once 'modelo/comodato.php';

class controlComodato{
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
    public function registroComodato($comodato){
        try{
            $sql= 'Insert Into comodato (num_comodato, imei_equipo, serial_impresora, estado, vigencia, observaciones) values (?, ?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $comodato->GetNComodato(),
                $comodato->GetImeiEquipo(),
                $comodato->GetSerialImpresora(),
                $comodato->GetEstado(),
                $comodato->GetVigencia(),
                $comodato->GetObservaciones()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    
    
}