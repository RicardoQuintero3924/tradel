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
            $sql= 'Insert Into impresora (tipo_impresora, serial, estado, disponible, observaciones) values (?, ?, ?, ?, ?)';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $impresora->GetTImpresora(),
                $impresora->GetSerial(),
                $impresora->Getestado(),
                $impresora->GetDisponible(),
                $impresora->GetObservaciones()
            ]);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function consultaTImpresora(){
       try{
        $sql = 'SELECT tipo FROM tipoimpresora';
        $prep = $this->cnx->prepare($sql);
        $prep->execute();
        $tipo = $prep->fetchAll(PDO::FETCH_OBJ);
       }catch(PDOException $ex){
        die($ex->getMessage());
       }
        return $tipo;
    }
    
    public function consultaDisponible(){
        try{
            $sql = 'Select tipo_impresora, serial, disponible from impresora';
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $print = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $print;
    }

    public function actualizarDisponible($estadoI){
        try{
            $sql = 'UPDATE impresora SET disponible = ? WHERE serial = ?';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $estadoI->GetDisponible(),
                $estadoI->GetSerial()
            ]);
            return true;
        }
        catch(PDOException $ex){
            die($ex->getMessage());
            return false;
        }

    }
}