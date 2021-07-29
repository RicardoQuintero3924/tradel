<?php 
require_once 'modelo/actualizaDE.php';
require_once 'modelo/actualizaDI.php';
require_once 'modelo/actualizarMantenimiento.php';
require_once 'control/controlMantenimiento.php';
require_once 'control/controlEquipo.php';
require_once 'control/controlImpresora.php';
$controlMantenimiento = new controlMantenimiento();
$caso = $controlMantenimiento->consultaCasos();
$controlEquipo = new controlEquipo();
$controlImpresora = new controlImpresora();
$status = null;
$statusI = null;
$estado= null;
$errores = "";
if(isset($_POST['actualizar'])){
    $im = $_POST['imei'];
    $tequipo = $_POST['tequipo'];
    $estado = (isset($_POST['estado'])) ? implode(', ', $_POST['estado']) : '';
    $descripcion = $_POST['descripcion'];
    $nroFactura = $_POST['factura'];
    $case = $_POST['caso'];

    if($estado == ''){
        $errores .= 'Ingrese el Estado Del Equipo';
    }
    if(!empty($nroFactura)){
        $nroFactura = trim($nroFactura);
        $nroFactura = filter_var($nroFactura, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Debe registrar el numero de la factura';
    }
    if($estado == "cerrado M"){
        $dispo = 1;
    }else{
        $dispo = 0;
    }
    $statusI = new actualizaIDisponible($dispo, $im);
    $status = new actualizaEDisponible($dispo, $im);
    if($tequipo == 'IMPRESORA'){
        $controlImpresora->actualizarDisponible($statusI);
    }else{
        $controlEquipo->actualizarDisponible($status);
    }
    
    if(!$errores){
    
    $actuaMan = new actualizarMantenimiento($nroFactura, $estado, $descripcion, $case);
    $controlMantenimiento->actualizarMantenimiento($actuaMan);
   
    echo '<script type="text/javascript"> alert("Registro Actualizado con Exito!")</script>';
    }else{
        echo '<script type="text/javascript"> alert("Registro Erroneo!")</script>';
    }
    
}
var_dump($statusI);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/seleccione.css">
    <title>Mantenimiento Cierre Casos</title>
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
    <!-- <nav class="icono contenedor">
        <a href="mantenimiento.php"><i class="far fa-hand-point-left"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav> -->
    <div class="filtro">
        <form method="POST">
            <fieldset class="contenedor">
                <legend>CASO:</legend>
                <select  class="seleccione" name="caso" id="caso">
                <option value="" disabled selected>-- Seleccione --</option>
                    <?php foreach($caso as $info): ?>
                        <option value="<?php echo $info->caso ?>"><?php echo $info->caso ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="consultar" name="consultar" class="btnseleccion">
            </fieldset>
        </form>
    </div>
    <?php 
    if(isset($_POST['consultar'])){
    $nrocaso = $_POST['caso'];
    $consulta = $controlMantenimiento->consultaCaso($nrocaso);
    foreach($consulta as $inf):?>
    <form method="POST" class="contenedor" >
        <fieldset class="contenedor seccion-equipo">
            <legend>Mantenimiento Cierre</legend>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI EQUIPO..." value="<?php echo $inf->imei ?>">
            <label for="tequipo">Tipo Equipo:</label>
            <input type="text" id="tequipo" name="tequipo" value="<?php echo $inf->tequipo ?>">
            <label for="costo">COSTO:</label>
            <input type="text" id="costo" name="costo" placeholder="COSTO MANTENIMIENTO..." value="<?php echo $inf->costo ?>">
            <label for="factura">Nro factura:</label>
            <input type="text" id="factura" name="factura" placeholder="NUMERO FACTURA...">
            <label for="caso">CASO:</label>
            <input type="text" name="caso" id="caso" value="<?php echo $inf->caso ?>">
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" <?php $inf->descripcion ?>></textarea>
            <label for="estado[]">Estado:</label>
            <div class="aplicaciones">
                <label for="estado">Cerrar:</label><input type="checkbox" id="enviado" value="cerrado M" name="estado[]" class="ehs">
                <label for="estado" class="cotizacion">Baja:</label><input type="checkbox" id="cerrado" value="cerrado B" name="estado[]" class="ehs">
            </div>
        </fieldset>
        <input type="submit" value="actualizar" name="actualizar" class="boton">
   <?php 
    endforeach; }?> 
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>