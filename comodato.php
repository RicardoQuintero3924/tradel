<?php
$errores = '';

if(isset($_POST['enviar'])){
    $nComodato = $_POST['nComodato'];
    $imei = $_POST['imei'];
    $serial = $_POST['serial'];
    $estado = $_POST['estado'];
    $vigencia = $_POST['vigencia'];
    $observaciones = $_POST['observaciones'];

    if(!empty($nComodato)){
        $nComodato = trim($nComodato);
        $nComodato = filter_var($nComodato, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese el Número del Comodato </br>';
    }

    if(!empty($imei)){
        $imei = trim($imei);
        $imei = filter_var($imei, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese el Imei del Equipo </br>';
    }

    if(!empty($serial)){
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese el Serial del Equipo </br>';
    }

    if(!empty($estado)){
        $estado = trim($estado);
        $estado = filter_var($estado, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese el Estado del Comodato </br>';
    }

    if(!empty($vigencia)){
        $vigencia = trim($vigencia);
        $vigencia = filter_var($vigencia, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese la vigencia del Comodato </br>';
    }
    

    if(!$errores){
        require_once 'modelo/comodato.php';
        require_once 'control/controlComodato.php';
        $comodato = new comodato($nComodato, $imei, $serial, $estado, $vigencia, $observaciones);
        $controlComodato = new controlComodato();
        $controlComodato->registroComodato($comodato);
        echo'<script type="text/javascript"> alert("Registro Finalizado con Exito!")</script>';
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
    <!-- <link rel="stylesheet" href="js/main.js"> -->
    <title>Zebra Tradel</title>
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
    
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>control de Equipos</h1>
            </div>
        </div>
        <div class="icon contenedor">
            <a href="equipos.php"><i class="far fa-hand-point-left"></i></a>
            <a href="https://drive.google.com/file/d/1ICBHxSvk76mJXAR6f1e_f5EGp7-AfNzY/view?usp=sharing"><i class="fab fa-google-drive"></i></a>
            <a href="#"><i class="fas fa-search"></i></a>
        </div>
        <form method="post">
        <fieldset class="seccion-equipo">
            <legend>comodato</legend>
            <label for="nComodato">Número Comodato:</label>
            <input type="text" id="nComodato" name="nComodato" placeholder="Número Comodato...">
            <label for="imei">Imei equipo:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI Equipo...">
            <label for="serial">serial impresora:</label>
            <input type="text" id="serial" name="serial" placeholder="Serial Impresora...">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" placeholder="Estado...">
            <label for="vigencia">Vigencia:</label>
            <input type="date" id="vigencia" name="vigencia" placeholder="Vigencia Comodato DD/MM/AAAA">
            <label for="observacones">observaciones:</label>
            <textarea name="observaciones" id="observaciones"></textarea>
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