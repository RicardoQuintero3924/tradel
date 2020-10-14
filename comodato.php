<?php
$errores = '';

if(isset($_POST['enviar'])){
    
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
                <h1>control de Equipos</h1>
            </div>
        </div>
        <div class="icon contenedor">
            <a href="equipos.php"><i class="far fa-hand-point-left"></i></a>
            <a href="https://drive.google.com/file/d/1ICBHxSvk76mJXAR6f1e_f5EGp7-AfNzY/view?usp=sharing"><i class="fab fa-google-drive"></i></a>
            <a href="#"><i class="fas fa-search"></i></a>
        </div>
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
            <input type="text" id="vigencia" name="vigencia" placeholder="Vigencia Comodato DD/MM/AAAA">
            <label for="observacones">observaciones:</label>
            <textarea name="observaciones" id="observaciones"></textarea>
        </fieldset>
        <input type="submit" value="enviar" name="enviar" class="boton">
        <footer class="contenedor">
            <div class="footer">
                <p class="copyright">Todos los Derechos Reservados &copy; </p>
            </div>
        </footer>
</body>

</html>