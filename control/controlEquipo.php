<?php
require_once 'modelo/equipo.php';

class controlEquipo{
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
    public function registroEquipo($equipo){
       try{
        $sql= 'Insert into equipo (t_equipo, imei, serial, nro_sim, ciudad, ehs, celuweb, disponible, cargador, comodato, impresora) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $prep = $this->cnx->prepare($sql);
        $prep->execute([
            $equipo->GetTEquipo(),
            $equipo->GetImei(),
            $equipo->GetSerial(),
            $equipo->GetNSim(),
            $equipo->GetCiudad(),
            $equipo->GetEhs(),
            $equipo->GetCeluweb(),
            $equipo->GetDisponible(),
            $equipo->GetCargador(),
            $equipo->GetComodato(),
            $equipo->GetImpresora()
        ]);
       }
       catch(PDOException $ex){
           die($ex->getMessage());
       }

    }

}
