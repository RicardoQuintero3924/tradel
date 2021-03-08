<?php
    $errores= "";

    if(isset($_POST['enviar'])){
        $tipoEquipo = $_POST['tipoEquipo'];
        $tsiniestro = $_POST['tsiniestro'];
        $imei = $_POST['imei'];
        $serial = $_POST['serial'];
        $fsiniestro = $_POST['fsiniestro'];
        $empresa = $_POST['empresa'];
        $ruta = $_POST['ruta'];
        $nombre = $_POST['nombre'];

        if(empty($tipoEquipo)){
            $errores .= 'Por Favor Ingrese el Tipo de Equipo';
        }
        if(empty($tsiniestro)){
            $errores .= 'Debe Diligenciar el Tipo Siniestro';
        }
        if(!empty($imei)){
            $imei = trim($imei);
            $imei = filter_var($imei, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Diligenciar el Campo Imei';
        }
        if(!empty($serial)){
            $serial = trim($serial);
            $serial = filter_var($serial, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Diligenciar el campo Serial';
        }
        if(!empty($fsiniestro)){
            $fsiniestro = trim($fsiniestro);
            $fsiniestro = filter_var($fsiniestro, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Diligenciar el campo Siniestro';
        }
        if(!empty($empresa)){
            $empresa = trim($empresa);
            $empresa = filter_var($empresa, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Diligenciar el Campo Empresa';
        }
        if(!empty($ruta)){
            $ruta = trim($ruta);
            $ruta = filter_var($ruta, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Diligenciar el campo Ruta';
        }
        if(!empty($nombre)){
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Diligenciar el Campo Nombre';
        }
        
        if(!$errores){
            require_once 'modelo/siniestro.php';
            require_once 'control/controlSiniestro.php';
            $siniestro = new siniestro($tipoEquipo, $tsiniestro, $imei, $serial, $fsiniestro, $empresa, $ruta, $nombre);
            $controlSiniestro = new controlSiniestro();
            $controlSiniestro->registroSiniestro($siniestro);
            echo '<script type="text/javascript">alert("Siniestro Registrado con Exito! '.$tipoEquipo.'")</script>';
        }else{
            echo '<script type="text/javascript">alert("Error: Diligenciar todos los campos!")</script>';
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
    <title>Siniestros</title>
    <link rel="shortcut icon" href="favicon.ico" />
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
        <a href="reporteSura.php"><i class="fas fa-book"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>
    <form method="POST" class="contenedor">

        <fieldset class="contenedor seccion-equipo">
            <legend>siniestros</legend>
            <label for="tipoEquipo">Tipo Equipo:</label>
            <select name="tipoEquipo" id="tipoEquipo">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="tc25">TC25</option>
                <option value="zq110">ZQ110</option>
            </select>
            <label for="tsiniestro">Tipo Siniestro:</label>
            <select name="tsiniestro" id="tsiniestro">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="robo">Robo</option>
                <option value="daño">Daño</option>
            </select>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI EQUIPO...">
            <label for="serial">serial:</label>
            <input type="text" id="serial" name="serial" placeholder="SERIAL EQUIPO..">
            <label for="fecha">fecha siniestro:</label>
            <input type="text" id="fsiniestro" name="fsiniestro" placeholder="DD-MM-AAAA">
            <label for="empresa">EMPRESA:</label>
            <input type="text" id="empresa" name="empresa" placeholder="EMPRESA...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" name="ruta" placeholder="NUMERO Ruta...">
            <label for="nombre">nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="NOMBRE RESPONSABLE RUTA...">
        </fieldset>
        <input type="submit" value="enviar" name="enviar" class="boton">
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>