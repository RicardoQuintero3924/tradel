<?php 
class controlTipoEquipo{
    public function __construct(){
        require_once 'conexion/Db.php';
        try{
            $this->cnx = Db::conectar();
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function agregarTipoEquipo($tipoEquipo){
        try{
            $sql="insert into tiposequipo (tipo) values (?)";
        $prep = $this->cnx->prepare($sql);
        $prep->execute([
            $tipoEquipo->GetTipoEquipo()
        ]);
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        
    }
}