<?php
$errores = '';

if(isset($_POST['enviar'])){

    $nroComodato = $_POST['nroComodato'];
    $imei = $_POST['imei'];
    $serial = $_POST['serial'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $ruta = $_POST['ruta'];
    $observaciones = $_POST['observaciones'];

    if(!empty($nroComodato)){
        $nroComodato = trim($nroComodato);
        $nroComodato = filter_var($nroComodato, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Por Favor Ingrese El numero de Comodato';
    }

    if(!empty($imei)){
        $imei = trim($imei);
        $imei = filter_var($imei, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Por favor Ingrese el Imei a Asignar';
    }

    if(!empty($serial)){
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Por Favor Ingrese Serial de la Impresora a Asignar';
    }

    if(!empty($nombre)){
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Por Favor Ingrese Nombre del Responsable de los Equipos';
    }

    if(!empty($cedula)){
        $cedula = trim($cedula);
        $cedula = filter_var($cedula, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese Cedula del Responsable de los Equipos';
    }

    if(!empty($ruta)){
        $ruta = trim($ruta);
        $ruta = filter_var($ruta, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese La Ruta Responsable de los Equipos';
    }

    if(!$errores){
        require_once 'modelo/asignacion.php';
        require_once 'control/controlAsignacion.php';

        $asignacion = new asignacion($nroComodato, $imei, $serial, $nombre, $cedula, $ruta, $observaciones);
        $controlAsignacion = new controlAsignacion();
        $controlAsignacion->registroAsignacion($asignacion);
        echo '<script type="text/javascript"> alert("Asigancion Realizada con Exito")</script>';
    }else{
    echo '<script type="text/javascript"> alert("POR FAVOR INGRESAR BIEN LA INFORMACION EN LOS CAMPOS OBLIGATORIOS")</script>';
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
</head>

<body>

    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>control de celularess</h1>
            </div>
        </div>
        <div class="icon contenedor">
            <a href="equipos.php"><i class="far fa-hand-point-left"></i></a>
            <a href="#"><i class="fas fa-search"></i></a>
        </div>
        <form method="POST">
        <fieldset class="seccion-equipo">
            <legend>Asignación Equipos</legend>
            <label for="nComodato">Número Comodato:</label>
            <input type="text" id="nComodato" name="nroComodato" placeholder="Número Comodato...">
            <label for="imei">Imei equipo:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI Equipo...">
            <label for="serial">serial impresora:</label>
            <input type="text" id="serial" name="serial" placeholder="Serial Impresora...">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre Responsable...">
            <label for="cedula">Cedula:</label>
            <input type="text" id="cedula" name="cedula" placeholder="Ingrese Cedula...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" name='ruta' placeholder="Numero Ruta...">
            <label for="observacones">observaciones:</label>
            <textarea name="observaciones" id="observaciones"></textarea>
        </fieldset>
        <input type="submit" class="boton" name="enviar">
        </form>
        <footer class="contenedor">
            <div class="footer">
                <p class="copyright">Todos los Derechos Reservados &copy; </p>
            </div>
        </footer>
</body>

</html>