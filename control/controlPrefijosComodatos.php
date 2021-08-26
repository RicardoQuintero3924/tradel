<?php
require_once 'modelo/prefijosComodatos.php';
require_once 'modelo/nroComodato.php';

class controlPrefijoComodato {

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

    public function consultaTodosPrefijos(){
        try{
        $sql= "SELECT prefijo FROM prefijocomodato";
        $prep = $this->cnx->prepare($sql);
        $prep->execute();
        $prefijos = $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $prefijos;
    }

    public function consultaNroComodatos($prefijo){
        try{
            $sql= "SELECT consecutivo FROM nrocomodato WHERE prefijo ='$prefijo'";
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $consecutivo = $prep->fetchAll(PDO::FETCH_OBJ);
            }catch(PDOException $ex){
                die($ex->getMessage());
            }
            return $consecutivo;
    }

    public function actualizaNroComodato($update){
        try{
            $sql='UPDATE nrocomodato SET consecutivo = ? WHERE prefijo = ?';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $update->GetConsecutivo(),
                $update->GetPrefijo()
            ]);
            return true;
        }catch(PDOException $ex){
            die($ex->getMessage());
            return false;
        }
    }
}