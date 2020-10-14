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
        <fieldset class="seccion-equipo">
            <legend>Asignación Equipos</legend>
            <label for="nComodato">Número Comodato:</label>
            <input type="text" id="nComodato" placeholder="Número Comodato...">
            <label for="imei">Imei equipo:</label>
            <input type="text" id="imei" placeholder="IMEI Equipo...">
            <label for="serial">serial impresora:</label>
            <input type="text" id="serial" name="serial" placeholder="Serial Impresora...">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre Responsable...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" placeholder="Numero Ruta...">
            <label for="observacones">observaciones:</label>
            <textarea name="observaciones" id="observaciones"></textarea>



        </fieldset>
        <input type="submit" class="boton">
        <footer class="contenedor">
            <div class="footer">
                <p class="copyright">Todos los Derechos Reservados &copy; </p>
            </div>
        </footer>
</body>

</html>