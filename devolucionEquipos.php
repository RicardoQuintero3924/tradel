<?php
require_once 'control/controlAsignacion.php';
$controlAsignación = new controlAsignacion();
$asignacion = $controlAsignación->consultaAsignados();


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
    <title>Consulta Equipos Asignados</title>
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>devolucion de Equipos</h1>
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
                            <li><a href="comodato.php">Comodato</a></li>
                        </ul>
                    </li>
                    <li> <a href="">Control<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="envioMantenimiento.php">Envió Mantenimiento</a></li>
                            <li><a href="mantenimiento.php">Registro Mantenimiento</a></li>
                            <li><a href="mantenimientoCierre.php">Cierre Mantenimiento</a></li>
                            <li><a href="vSiniestroRobo.php">Siniestro</a></li>

                        </ul>
                    </li>
                    <li><a href="">Reportes<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="reporteSura.php">Reporte Aseguradora</a></li>
                        </ul>
                    </li>
                    <li><a href="info_soporte.php">Info-Soporte</a></li>

                </ul>
            </nav>
        </div>
    </header>
   
    <div class="informe">
        
        <table class="contenedor">
            <tr class="celda">
                <th>Nro Comodato</th>
                <th>Imei Equipo</th>
                <th>Serial Impresora</th>
                <th>Nombre Responsable</th>
                <th>Ruta</th>
                <th>PDF</th>
            </tr>
            <?php foreach ($asignacion as $asig) : ?>
                <tr class="fila">
                    <?php if ($asig->activo == 1) { ?>
                        <td><?= $asig->nroComodato ?></td>
                        <td><?= $asig->imei ?></td>
                        <td><?= $asig->serial ?></td>
                        <td><?= $asig->nombreR ?></td>
                        <td><?= $asig->ruta ?></td>
                        <td><a href="devolucionPDF.php?nroComodato=<?= $asig->nroComodato?>"><i class="fas fa-file-pdf"></i></a></td>
                </tr>
            <?php  }  ?>
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