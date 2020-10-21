<?php
$errores = "";

if(isset($_POST['enviar'])){
    $tp = $_POST['tp'];
    $imei = $_POST['imei'];
    $serial = $_POST['serial'];
    $sim = $_POST['sim'];
    $ciudad = $_POST['ciudad'];
    $ehs = (isset($_POST['ehs'])) ? : 'false';
    $celuweb = (isset($_POST['celuweb'])) ? : 'false';
    $disponible = (isset($_POST['disponible'])) ? : 'false';
    $cargador = (isset($_POST['cargador'])) ? : 'false';
    $comodato = (isset($_POST['comodato'])) ? : 'false';
    $backup = (isset($_POST['backup']))? : 'false';

    //validando tipo de equipo
    if($tp == ''){
        $errores .= 'Debe Seleccionar al menos un tipo de equipo!';
    }
    //validando el imei
    if(!empty($imei)){
        $imei = trim($imei);
        $imei = filter_var($imei, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar el IMEI del equipo';
    }
    //validando el serial
    if(!empty($serial)){
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar el Serial del Equipo';
    }
    //validando sim
    if(!empty($sim)){
        $sim = trim($sim);
        $sim = filter_var($sim, FILTER_SANITIZE_STRING);

    }else{
        $errores .= 'Debe Ingresar el numero de SIM';
    }
    //validando ciudad
    if(!empty($ciudad)){
        $ciudad = trim($ciudad);
        $ciudad = filter_var($ciudad, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar una Ciudad';
    }
     
    if(!$errores){
        require_once 'modelo/equipo.php';
        require_once 'control/controlEquipo.php'; 
        $equipo = new Equipo($tp, $imei, $serial, $sim, $ciudad, $ehs, $celuweb, $disponible, $cargador, $comodato, $backup);
        $equipoControl = new controlEquipo();
        $equipoControl->registroEquipo($equipo);
        echo '<script type="text/javascript">alert("Equipo Registrado con Exito!")</script>';        
    }else{
        echo '<script type="text/javascript">alert("DebeDiligenciar Todos los campos!")</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Equipos</title>
</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>control de Equipos</h1>
            </div>
        </div>
    </header>
    <nav class="icono contenedor">
        <a href="paginaPrincipal.php"><i class="far fa-hand-point-left"></i></a>
        <a href="impresora.php"><i class="fas fa-print"></i></a>
        <a href="asignacion.php"><i class="fas fa-address-book"></i></a>
        <a href="#"><i class="fas fa-pencil-alt"></i></a>
        <a href="comodato.php"><i class="far fa-file-alt"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>
    
    <form method="POST" class="contenedor">

        <fieldset class="contenedor seccion-equipo">
            <legend>Equipos</legend>
            <label for="Tp">Tipo Equipo:</label>
            <select name="tp" id="tp">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="TC25">TC25</option>
                <option value="ZQ110">ZQ110</option>
            </select>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI EQUIPO...">
            <label for="serial">serial:</label>
            <input type="text" id="serial" name="serial" placeholder="SERIAL EQUIPO..">
            <label for="sim">Numero Sim:</label>
            <input type="text" id="sim" name="sim" placeholder="NUMERO SIM...">
            <label for="ciudad">CIUDAD:</label>
            <input type="text" id="ciudad" name="ciudad" placeholder="CIUDAD...">
            <label for="aplicaciones">Aplicaciones Instaladas:</label>
            <div class="aplicaciones">
                <label for="ehs">ehs:</label><input type="radio" id="ehs"  name="ehs" class="ehs">
                <label for="celuweb" class="celuweb">Celuweb:</label><input type="radio" id="celuweb"  name="celuweb" class="ehs">
            </div>
            <label for="estado">Estado:</label>
            <div class="estado">
                <label for="disponible">Disponible:</label><input type="radio" id="disponible" name="disponible">
                <label for="cargador">Cargador:</label><input type="radio" id="cargador"  name="cargador">
                <label for="comodato">Comodato:</label><input type="radio" id="comodato"  name="comodato">
                <label for="backup">Backup:</label><input type="radio" id="impresora"  name="backup">
            </div>

        </fieldset>
        <input type="submit" value="enviar" name="enviar" class="boton">
        <div class="errores">
            <pre>
                <p><? $errores ?></p>
            </pre>
        </div>
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>