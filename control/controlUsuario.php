<?php
require_once 'modelo/usuario.php';

class controlUsuario{
    private $cnx;

    public function __construct(){
        require_once 'conexion/Db.php';
        try{
            $this->cnx = Db::conectar();
        }
        catch (PDOException $ex){
            die($ex->getMessage());
        }
    }
  public function buscarUsuario(){
      try{
          $sql = "Select * from usuario";
          $prep = $this->cnx->prepare($sql);
          $prep->execute();
          $usuarios = $prep->fetchAll(PDO::FETCH_OBJ);
      }
      catch(PDOException $ex){
          die($ex->getMessage());
      }
      return $usuarios;
  }

  public function buscarPorUsuario($user){
      try{
        $sql = 'Select * from usuario Where usuario= ? ';
        $prep = $this->cnx->prepare($sql);
        $prep->execute([$user]);
        $usuarios = $prep->fetchAll(PDO::FETCH_OBJ);
      }
      catch(PDOException $ex){
          die($ex->getMessage());
      }
      return $usuarios;
  }
}