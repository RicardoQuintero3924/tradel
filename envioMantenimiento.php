<?php
require_once 'control/controlTipoEquipo.php';
$tipoEquipos = new controlTipoEquipo();
$tipos = $tipoEquipos->consultarTipoEquipo();
$errores = "";

if (isset($_POST['enviar'])) {
    $tipoEquipo = $_POST['tipoEquipo'];
    $imei = $_POST['imei'];
    $serial = $_POST['serial'];
    $sedeE = $_POST['sedeE'];
    $fechaE = $_POST['fechaE'];
    $empresa = $_POST['empresa'];
    $ruta = $_POST['ruta'];
    $responsableE = $_POST['responsableE'];
    $observaciones = $_POST['observaciones'];

    if (empty($tipoEquipo)) {
        $errorres .= 'Seleccionar el Tipo de Equipo';
    }

    if (!empty($imei)) {
        $imei = trim($imei);
        $imei = filter_var($imei, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Diligenciar el Imei del Equipo';
    }

    if (!empty($serial)) {
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Diligenciar el serial del Equipo';
    }
    if (!empty($sedeE)) {
        $sedeE = trim($sedeE);
        $sedeE = filter_var($sedeE, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Diligenciar la sede a la que se envia el Equipo';
    }
    if (!empty($fechaE)) {
        $fechaE = trim($fechaE);
        $fechaE = filter_var($fechaE, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Diligenciar la fecha de envio';
    }
    if (!empty($empresa)) {
        $empresa = trim($empresa);
        $empresa = filter_var($empresa, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Diligenciar el Campo Empresa';
    }
    if (!empty($ruta)) {
        $ruta = trim($ruta);
        $ruta = filter_var($ruta, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Debe Diligenciar el Campo Ruta';
    }
    if (!empty($responsableE)) {
        $responsableE = trim($responsableE);
        $responsableE = filter_var($responsableE, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Dede Diligenciar el Campo Responsable';
    }
    if (!empty($observaciones)) {
        $observaciones = trim($observaciones);
        $observaciones = filter_var($observaciones, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Por favor Ingrese los Comentarios del Equipo';
    }

    if (!$errores) {
        $dispo = 0;
        require_once 'modelo/envioMantenimientoM.php';
        require_once 'control/controlEquipo.php';
        require_once 'control/controlImpresora.php';
        require_once 'control/controlEnvioMantenimiento.php';
        require_once 'modelo/actualizaDE.php';
        require_once 'modelo/actualizaDI.php';
        //DEBERA LLEVAR UN FOR PARA QUE REVISE CUAL DE LOS EQUIPOS ES EL QUE DEBE SER ACTUALIZADO 
        // SE HACE ASI MIENTRAS SE ANEXAN EL RESTO DE EQUIPOS.
        if ($tipoEquipo == "TC25"){
            $datos = new actualizaEDisponible($dispo, $imei);
            $controlEquipo = new controlEquipo();
            $controlEquipo->actualizarDisponible($datos);
        }else{
            $datos = new actualizaIDisponible($dispo, $imei);
            $controlImpresora = new controlImpresora();
            $controlImpresora->actualizarDisponible($datos);
        }
            
        $mantenimiento = new envioMantenimiento($tipoEquipo, $imei, $serial, $sedeE, $fechaE, $empresa, $ruta, $responsableE, $observaciones);
        $controlEnvio = new ControlEnvioMantenimiento();
        $controlEnvio->registroEnvioMantenimiento($mantenimiento);
        echo '<script type="text/javascript">alert("Envío Registrado con Exito!")</script>';
    } else {
        echo '<script type="text/javascript">alert("Error Falta Diligenciar Campos!")</script>';
    }
    require_once 'control/controlTipoEquipo.php';
    $tipoEquipo = new controlTipoEquipo();
    $tipos = $tipoEquipo->consultarTipoEquipo();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/envioEquipo.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Envío Equipo Mantenimiento</title>
    <link rel="shortcut icon" href="favicon.ico" />

</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>Equipos Mantenimiento</h1>
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
    <!-- <nav class="icono contenedor">
        <a href="paginaPrincipal.php"><i class="far fa-hand-point-left"></i></a>
        <a href="mantenimiento.php"><i class="fas fa-folder"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav> -->
    <form method="POST" class="contenedor envio">
        <fieldset class="envio">
            <legend>Envio Equipos Mantenimiento</legend>
            <label for="tipoEquipo">Tipo Equipo:</label>
            <select name="tp" id="tp">
                <option value="" disabled selected>-- Seleccione --</option>
                <?php foreach($tipos as $tipo):?>
                <option value="<?php echo $tipo->tipo?>"><?php echo $tipo->tipo?></option>
                <?php endforeach;?>
            </select>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI EQUIPO...">
            <label for="serial">serial:</label>
            <input type="text" id="serial" name="serial" placeholder="SERIAL EQUIPO..">
            <label for="sedeE">sede Envio:</label>
            <input type="text" id="sedeE" name="sedeE" placeholder="SEDE A LA QUE SE ENVIO EL EQUIPO">
            <label for="fechaE">fecha envio:</label>
            <input type="date" id="fechaE" name="fechaE" placeholder="DD-MM-AAAA">
            <label for="empresa">EMPRESA:</label>
            <input type="text" id="empresa" name="empresa" placeholder="EMPRESA...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" name="ruta" placeholder="NUMERO Ruta...">
            <label for="responsableE">responsable Equipo:</label>
            <input type="text" id="responsableE" name="responsableE" placeholder="NOMBRE RESPONSABLE EQUIPO...">
            <label for="observaciones">Observaciones:</label>
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