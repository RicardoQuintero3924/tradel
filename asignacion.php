<?php
$errores = '';
//LLAMANDO EL CONTROL E INSTANCIANDOLO PARA EL EQUIPO
require_once 'control/controlEquipo.php';
$controlEquipo = new controlEquipo();
$equipo = $controlEquipo->consultaDisponible();
//-------------------------------------------------
//LLAMANDO EL CONTROL PARA LA IMPRESORA E INSTANCIANDO
require_once 'control/controlImpresora.php';
$controlImpresora = new controlImpresora();
$print = $controlImpresora->consultaDisponible();
//--------------------------------------------------
//LLAMANDO EL CONTROL PARA EL PREFIJO E INSTANCIANDO
require_once 'control/controlPrefijosComodatos.php';
$controlPrefijo = new controlPrefijoComodato();
$prefijos = $controlPrefijo->consultaTodosPrefijos();
//---------------------------------------------------
if (isset($_POST['enviar'])) {
    $prefijo = $_POST['prefijo'];
    $imei = $_POST['imei'];
    $serial = $_POST['serial'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $ruta = $_POST['ruta'];
    $observaciones = $_POST['observaciones'];


    if (!empty($prefijo)) {
        $prefijo = trim($prefijo);
        $prefijo = filter_var($prefijo, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Por Favor Ingrese El numero de Comodato';
    }

    if (!empty($imei)) {
        $imei = trim($imei);
        $imei = filter_var($imei, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Por favor Ingrese el Imei a Asignar';
    }

    if (!empty($serial)) {
        $serial = trim($serial);
        $serial = filter_var($serial, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Por Favor Ingrese Serial de la Impresora a Asignar';
    }

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Por Favor Ingrese Nombre del Responsable de los Equipos';
    }

    if (!empty($cedula)) {
        $cedula = trim($cedula);
        $cedula = filter_var($cedula, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Ingrese Cedula del Responsable de los Equipos';
    }

    if (!empty($ruta)) {
        $ruta = trim($ruta);
        $ruta = filter_var($ruta, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Ingrese La Ruta Responsable de los Equipos';
    }
    $activo = true;
    $disponible = 0;

    if (!$errores) {
        require_once 'modelo/asignacion.php';
        require_once 'modelo/actualizaDE.php';
        require_once 'modelo/actualizaDI.php';
        require_once 'control/controlAsignacion.php';
        require_once 'control/controlEquipo.php';
        require_once 'control/controlImpresora.php';
        require_once 'modelo/nroComodato.php';
        $estado = new actualizaEDisponible($disponible, $imei);
        $estadoI = new actualizaIDisponible($disponible, $serial);
        //Proceso de asignacion de prefijo + consecutivo
        $consecutivo = $controlPrefijo->consultaNroComodatos($prefijo);
        foreach($consecutivo as $num):
        $numeracion = (int)$num->consecutivo;
        $numeracion++;
        endforeach;
        $nroComodato = "$prefijo-00$numeracion";
        //-------------------------------------------------------------------
        //ACTUALIZANDO EL CONSECUTIVO EN BD
        $update = new NroComodato($numeracion, $prefijo);
        $controlPrefijo->actualizaNroComodato($update);
        //---------------------------------------------------------------------
        //ASIGNACION DE LOS EQUIPOS LLAMANDO LOS METODOS E INSTANCIANDOLOS
        $asignacion = new asignacion($nroComodato, $imei, $serial, $nombre, $cedula, $ruta, $activo, $observaciones);
        $controlAsignacion = new controlAsignacion();
        $controlAsignacion->registroAsignacion($asignacion);
        //----------------------------------------------------------------------
        //CONTROL DE LOS EQUIPOS (PROCESOS PARA LA ACTUALIZACION DE DISPONIBLE TANTO DE IMPRESORA COMO DE EQUIPO)
        $controlEquipo = new controlEquipo();
        $controlEquipo->actualizarDisponible($estado);
        $controlImpresora = new controlImpresora();
        $controlImpresora->actualizarDisponible($estadoI);
        //-------------------------------------------------------------------------------------------------
        echo '<script type="text/javascript"> alert("Asigancion Realizada con Exito")</script>';
    } else {
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
    <title>Zebra Tradel</title>
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
    <div class="contenedor">
        <header>
            <div class="barra contenedor">
                <div class="titulo">
                    <h1>control de celularess</h1>
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
        <form method="POST">
            <fieldset class="seccion-equipo">
                <legend>Asignación Equipos</legend>

                <label for="prefijo">Prefijo:</label>
                <select name="prefijo" id="prefijo">
                    <option value="" disabled selected>--Seleccione--</option>
                    <?php foreach ($prefijos as $prefijo) : ?>
                        <option value="<?php echo $prefijo->prefijo ?>"><?php echo $prefijo->prefijo ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="imei">Imei equipo:</label>
                <select name="imei" id="imei">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php foreach ($equipo as $equi) : ?>
                        <?= $dispo = $equi->disponible;
                        if ($dispo == 1) { ?>
                            <option value="<?php echo $equi->imei ?>"><?php echo $equi->t_equipo . ' - ' . $equi->imei ?></option>
                    <?php }
                    endforeach; ?>
                </select>
                <label for="serial">serial impresora:</label>
                <select name="serial" id="serial">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <?php foreach ($print as $prin) : ?>
                        <?= $disp = $prin->disponible;
                        if ($disp == 1) { ?>
                            <option value="<?php echo $prin->serial ?>"><?php echo $prin->tipo_impresora . ' - ' . $prin->serial ?></option>
                    <?php }
                    endforeach; ?>
                </select>
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
    </div>
</body>

</html>