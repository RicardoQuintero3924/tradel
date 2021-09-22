<?php
require_once 'control/controlEnvioMantenimiento.php';
$controlEnvio = new ControlEnvioMantenimiento();
$casos = $controlEnvio->ConsultaTodo();
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
    <title>Informe Envio Mantenimiento</title>
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>control de Equipos</h1>
            </div>
        </div>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="paginaPrincipal.php"><i class="fas fa-home"></i></a></li>
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
    <div class="informe">
        <table class="contenedor">
            <tr class="celda">
                <th>Tipo Equipo</th>
                <th>Imei</th>
                <th>Serial</th>
                <th>Ruta</th>
                <th>Ciudad</th>
                <th>fecha Envío</th>
            </tr>
            <?php foreach ($casos as $caso) : ?>
                <tr class="fila">
                    <td><?= $caso->tipo_equipo ?></td>
                    <td><?= $caso->imei ?></td>
                    <td><?= $caso->serial ?></td>
                    <td><?= $caso->ruta ?></td>
                    <td><?= $caso->sedeE ?></td>
                    <td><?= $caso->fecha ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
    <script src="jquery-1.12.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>