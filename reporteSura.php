<?php
$errores = "";
if(isset($_POST['enviar'])){
    $tipo = $_POST['tipo'];
    $reporte = $_POST['nReporte'];
    $cobrado = $_POST['cobro'];
    $pagado = $_POST['pSura'];
    $denuncia = $_POST['denuncia'];
    $observacion = $_POST['observaciones'];

    if(!empty($tipo)){
        $tipo = trim($tipo);
    }else{
        $errores .= 'Debe Seleccionar el Tipo';
    }

    if(!empty($reporte)){
        $reporte = trim($reporte);
        $reporte = filter_var($reporte, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar el numero del reporte';
    }

    if(!empty($cobrado)){
        $cobrado = trim($cobrado);
        $cobrado = filter_var($cobrado, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar un cobrodo a';
    }

    if(!empty($pagado)){
        $pagado = trim($pagado);
        $pagado = filter_var($pagado, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar un valor';
    }

    if(!empty($denuncia)){
        $denuncia = trim($denuncia);
        $denuncia = filter_var($denuncia, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe Ingresar la Denuncia';
    }

    if(!empty($observacion)){
        $observacion = trim($observacion);
        $observacion = filter_var($observacion, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'observacion';
    }

    if(!$errores){
        require_once 'modelo/mReporteSura.php';
        require_once 'control/controlReporteS.php';

        $registro = new ReporteSura($tipo, $reporte, $cobrado, $pagado, $denuncia, $observacion);
        $controlReporte = new controlReporte();
        $controlReporte->RegistroReporte($registro);
        echo '<script type="text/javascript">alert("Reporte Registrado con Exito!")</script>';        
    }else{
        echo '<script type="text/javascript">alert("Debe Diligenciar Todos los campos!")</script>';
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
    <div class="evento">
        <div class="title contenedor">
            <!-- <h2>Reporte Sura</h2> -->
            <!-- <div class="select ">
                <a href="#robo">Robo</a>
                <a href="#daño">Daño</a>
            </div> -->
            <!-- <div class="icon contenedor">
                <a href="vSiniestroRobo.php"><i class="far fa-hand-point-left"></i></a>
                <a href="#"><i class="fas fa-search"></i></a>
            </div> -->
        </div>
        <form method="POST">
            <fieldset id="robo" class="contenedor seccion-equipo info  clearflix">
                <legend>Reporte Aseguradora</legend>
                <label for="tipo">Tipo Reporte</label>
                <select name="tipo" id="tipo">
                <option value="" disabled selected>--seleccione--</option>
                <option value="daño">Daño</option>
                <option value="robo">Robo</option>
                </select>
                <label for="nReporte">Numero Reporte SURA:</label>
                <input type="text" id="nReporte" value="" name="nReporte" placeholder="Numero Reporte SURA...">
                <label for="cobro">Cobrado A:</label>
                <input type="text" id="cobro" name="cobro" placeholder="Cobrado A...">
                <label for="pSura">Pagado Por SURA:</label>
                <input type="text" id="pSura" name="pSura" placeholder="Papagado Por Sura...">
                <label for="denuncia">Denuncia:</label>
                <input type="text" id="denuncia" name="denuncia" placeholder="Número Denuncia...">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones"></textarea>
                <div class="contenedor">
                    <input type="submit" class="boton" name="enviar">
                </div>
            </fieldset>

            <!-- <fieldset id="daño" class="contenedor seccion-equipo info  clearfix">
                <legend>daño</legend>
                <label for="cReparacion">Costo Reparacion:</label>
                <input type="text" id="cReparacios" name="cReparacion" value="" placeholder="Costo Reparacion...">
                <label for="rSura">Reporte Sura:</label>
                <input type="text" id="rSura" name="rSura" value="" placeholder="Reporte Sura...">
                <label for="cobrado">Cobrado A:</label>
                <input type="text" id="cobrado" name="cobrado" value="" placeholder="Cobrado a...">
                <label for="cMantenimiento">Numero Caso Mantenimiento:</label>
                <input type="text" id="cMantenimiento" name="cMantenimiento" value="" placeholder="Numero Caso Mantenimiento...">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones"></textarea>
                <div class="contenedor">
                    <input type="submit" class="boton">
                </div>

            </fieldset> -->


    </div>
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
    <script src="jquery-1.12.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>