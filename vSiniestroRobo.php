<?php
$errores = "";
if (isset($_POST['enviar'])) {
    $tipoEquipo = $_POST['tp'];
    $imei = $_POST['imei'];
    $serial = $_POST['serial'];
    $fecha = $_POST['fecha'];
    $responsable = $_POST['responsable'];
    $ruta = $_POST['ruta'];
    $nroDenuncio = $_POST['nrode'];

    if (!empty($tipoEquipo)) {
        $tipoEquipo = trim($tipoEquipo);
        $tipoEquipo = filter_var($tipoEquipo, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Seleccione el Tipo de Equipo';
    }
    if ($tipoEquipo != 'ZQ110') {
        if (!empty($imei)) {
            $imei = trim($imei);
            $imei = filter_var($imei, FILTER_SANITIZE_STRING);
        } else {
            $errores .= 'Debe Ingresar el Imei del Equipo';
        }
    }

    if (!empty($serial)) {
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Ingresar un Serial';
    }

    if(!empty($fecha)){
        $fecha = trim($fecha);
        $fecha = filter_var($fecha, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Seleccione la Fecha del Robo';
    }

    if(!empty($responsable)){
        $responsable = trim($responsable);
        $responsable = filter_var($responsable, FILTER_SANITIZE_STRING);
    }else{
        $errores.= 'Debe Ingresar un Responsable del Equipo';
    }

    if(!empty($ruta)){
        $ruta = trim($ruta);
        $ruta = filter_var($ruta, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe ingresar la Ruta.';
    }
    if(!empty($nroDenuncio)){
        $nroDenuncio = trim($nroDenuncio);
        $nroDenuncio = filter_var($nroDenuncio, FILTER_SANITIZE_STRING);
    }else{
        $errores.= 'Debe Ingresar el numero del denuncio';
    }

    if(!$errores){
        require_once 'control/controlSiniestroRobo.php';
        require_once 'modelo/siniestroRobo.php';
        $controlSiniestro = new controlSiniestroRobo();
        $siniestro = new SiniestroRobo($tipoEquipo, $imei, $serial, $fecha, $responsable, $ruta, $nroDenuncio); 
        $controlSiniestro->registroSiniestro($siniestro);
        echo '<script type="text/javascript">alert("Robo Registrado con Exito!")</script>';
    }else{
        echo '<script type="text/javascript">alert("Por Favor Valide todos los campos!")</script>';
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
    <title>Siniestro Robo</title>
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
        <a href="reporteSura.php"><i class="fas fa-address-book"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>

    <form method="POST" class="contenedor">

        <fieldset class="contenedor seccion-equipo">
            <legend>Siniestro Robo</legend>
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
            <label for="fecha">Fecha Robo:</label>
            <input type="date" id="fecha" name="fecha" placeholder="NUMERO SIM...">
            <label for="responsable">Responsable:</label>
            <input type="text" id="responsable" name="responsable" placeholder="RESPONSABLE...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" name="ruta" placeholder="RUTA...">
            <label for="nrode">Numero Denuncio:</label>
            <input type="text" id="nrode" name="nrode" placeholder="NUNMERO DENUNCIA...">

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