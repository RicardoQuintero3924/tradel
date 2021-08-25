<?php
require_once 'modelo/prefijosComodatos.php';

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
}