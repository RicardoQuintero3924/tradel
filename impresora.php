<?php
$errores = '';
if (isset($_POST['enviar'])) {
    $tImpresora = $_POST['tImpresora'];
    $serial = $_POST['serial'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];

    //validando tipo impresora
    if ($tImpresora == "") {
        $errores .= 'Debe Seleccionar Un Tipo de Impresora';
    }
    //validando serial
    if (!empty($serial)) {
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Ingresar el Serial';
    }
    //validando estado
    if (!empty($estado)) {
        $estado = trim($estado);
        $estado = filter_var($estado, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Ingrese El Estado Del Equipo';
    }
    //Validando Ciudad
    if(!empty($ciudad)){
        $ciudad = trim($ciudad);
        $ciudad = filter_var($ciudad, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese la ciudad Del Equipo';
    }
    //validando Observaciones
    if (!empty($observaciones)) {
        $observaciones = trim($observaciones);
        $observaciones = filter_var($observaciones, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Ingrese observaciones del equipo';
    }
    $disponible = 1;

    if (!$errores) {
        require_once 'modelo/mImpresora.php';
        require_once 'control/controlImpresora.php';

        $impresora = new impresora($tImpresora, $serial, $estado, $ciudad, $disponible, $observaciones);
        $impresoraControl = new controlImpresora();
        $impresoraControl->registroImpresora($impresora);
        echo '<script type="text/javascript"> alert("Registro Generado con Exito") </script>';
    }
}
//consultando el tipo de impresora para llevarlo al select
require_once 'control/controlImpresora.php';
$controlImpresora = new controlImpresora();
$tipo = $controlImpresora->consultaTImpresora();

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
    <div class="contenedor">
        <header>
            <div class="barra contenedor">
                <div class="titulo">
                    <h1>control de Equipos</h1>
                </div>
            </div>
            <div class="menu">
            <nav>
                <ul>
                    <li class="anchor"><a href="">Registro<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li class="submenu"><a href="equipos.php">Registro Equipo</a></li>
                            <li class="submenu"><a href="impresora.php">Registro Impresora</a></li>
                            <li class="submenu"><a href="asignacion.php">Asignación Equipos</a></li>
                        </ul>
                    </li>
                    <li> <a href="">Control<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="envioMantenimiento.php">Envió Mantenimiento</a></li>
                            <li><a href="mantenimiento.php">Registro Mantenimiento</a></li>
                            <li><a href="mantenimientoCierre.php">Cierre Mantenimiento</a></li>
                            <li><a href="vSiniestroRobo.php">Siniestro</a></li>
                            <li><a href="devolucionEquipos.php">Devolucion Equipos</a></li>
                        </ul>
                    </li>
                    <li><a href="">Reportes<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="reporteSura.php">Reporte Aseguradora</a></li>
                        </ul>
                    </li>
                    <li><a href="info_soporte.php">Info-Soporte</a></li>
                    <li><a href="">Informes<i class="fas fa-angle-down"></i></a>
                        <ul>
                        <li> <a href="informeEquipo.php">Consulta Equipos</a></li>
                        <li><a href="infoImpresora.php">Consulta Impresoras</a></li>
                        <li><a href="informeEnvioM.php">Consulta Envios Soporte</a></li>
                        <li><a href="InformeEquiposS.php">Consulta Casos Soporte</a></li>
                        <li><a href="informeAsignado.php">Consulta Equipos Asignados</a></li>
                    </ul>
                </ul>
            </nav>
        </div>
        </header>
        <!-- <div class="icon contenedor">
            <a href="equipos.php"><i class="far fa-hand-point-left"></i></a>
            <a href="#"><i class="fas fa-search"></i></a>
        </div> -->
        <form method="post">
            <fieldset class="seccion-equipo print">
                <legend>Impresoras</legend>
                <label for="tImpresora">Tipo Impresora:</label>
                <select name="tImpresora" id="tImpresora">
                    <option value="" disabled selected>Seleccione</option>
                    <?php foreach ($tipo as $im) : ?>
                        <option value="<?php echo $im->tipo ?>"><?php echo $im->tipo ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="serial">serial:</label>
                <input type="text" id="serial" name="serial" placeholder="Serial...">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" placeholder="Estado...">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad...">
                <label for="observacones">observaciones:</label>
                <textarea name="observaciones" id="observaciones"></textarea>
                <input type="submit" value="enviar" name="enviar" class="boton">

            </fieldset>
        </form>
        <footer class="contenedor">
            <div class="footer">
                <p class="copyright">Todos los Derechos Reservados &copy; </p>
            </div>
        </footer>
    </div>
</body>

</html>