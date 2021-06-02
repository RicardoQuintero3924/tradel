<?php
$errores = '';
if(isset($_POST['btn_enviar'])){
    $imei = $_POST['imei'];
    $costo = $_POST['costo'];
    $caso = $_POST['caso'];
    $estado = (isset($_POST['estado'])) ? implode(', ', $_POST['estado']) : '';
    $descripcion = $_POST['descripcion'];
    $nroFactura = $_POST['nroFactura'];

    if(!empty($imei)){
        $imei = trim($imei);
        $imei = filter_var($imei, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese el Imei';
    }

    if(!empty($costo)){
        $costo = trim($costo);
        $costo = filter_var($costo, FILTER_SANITIZE_NUMBER_INT);
    }else{
        $errores .= 'Ingrese el Costo del mantenimiento';
    }

    if(!empty($caso)){
        $caso = trim($caso);
        $caso = filter_var($caso, FILTER_SANITIZE_STRING);
    }else{
        $errores .= 'Ingrese El Numero de Caso';
    }


    // if($estado == ''){
    //     $errores .= 'Ingrese el Estado Del Equipo';
    // }

    if(!$errores){
       $estado = 'enviado'; 
       require_once 'modelo/mMantenimiento.php';
       require_once 'control/controlMantenimiento.php';
       $mantenimiento = new Mantenimiento($imei, $costo, $caso, $estado, $descripcion, $nroFactura );
       $controlMantenimiento = new controlMantenimiento();
       $controlMantenimiento->registroMantenimiento($mantenimiento);
       echo '<script type="text/javascript"> alert("Registro Almacenado con Exito!")</script>';

    }else{
        echo '<script type="text/javascript"> alert("Ingrese La Informacion de los Campos Obligatorios")</script>';
    }    
}
require_once 'control/controlMantenimiento.php'; 
$imeis = new controlMantenimiento();
$registro = $imeis->consultaImei();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Mantenimiento</title>
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
        <a href="envioMantenimiento.php"><i class="far fa-hand-point-left"></i></a>
        <a href="mantenimientoCierre.php"><i class="far fa-file-alt"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav> -->
    <form method="POST" class="contenedor">

        <fieldset class="contenedor seccion-equipo">
            <legend>Mantenimiento</legend>
            <label for="imei">IMEI:</label>
            <select name="imei" id="imei">
                <option value="" disabled selected>-- Seleccione --</option>
                <?php foreach($registro as $imei):?>
                <option value="<?php echo $imei->imei ?>"><?php echo $imei->imei ?></option>
                <?php endforeach ?>   
            </select>
            <label for="costo">COSTO:</label>
            <input type="text" id="costo" name="costo" placeholder="COSTO MANTENIMIENTO...">
            <label for="caso">CASO:</label>
            <input type="text" id="caso" name="caso" placeholder="CASO...">
            <label for="nroFactura">Numero factura:</label>
            <input type="text" id="nroFactura" name="nroFactura" placeholder="NUMERO FACTURA">
            <!-- <label for="estado[]">Estado:</label>
            <div class="aplicaciones">
                <label for="estado">Enviado:</label><input type="checkbox" id="enviado" value="enviado" name="estado[]" class="ehs">
            </div> -->
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion"></textarea>

        </fieldset>
        <input type="submit" value="enviar" name="btn_enviar" class="boton">
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>