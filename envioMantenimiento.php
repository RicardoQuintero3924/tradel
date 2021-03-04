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
</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>Equipos Mantenimiento</h1>
            </div>
        </div>
    </header>
    <nav class="icono contenedor">
        <a href="paginaPrincipal.php"><i class="far fa-hand-point-left"></i></a>
        <a href="mantenimiento.php"><i class="fas fa-folder"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>
    <form method="POST" class="contenedor envio">
        <fieldset class="envio">
            <legend>Envio Equipos Mantenimiento</legend>
            <label for="tipoEquipo">Tipo Equipo:</label>
            <select name="tipoEquipo" id="tipoEquipo" class="tipoequipo">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="tc25">TC25</option>
                <option value="zq110">ZQ110</option>
            </select>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI EQUIPO...">
            <label for="serial">serial:</label>
            <input type="text" id="serial" name="serial" placeholder="SERIAL EQUIPO..">
            <label for="sedeE">sede Envio:</label>
            <input type="text" id="sedeE" name="sedeE" placeholder="SEDE A LA QUE SE ENVIO EL EQUIPO">
            <label for="fechaE">fecha envio:</label>
            <input type="text" id="fechaE" name="fechaE" placeholder="DD-MM-AAAA">
            <label for="empresa">EMPRESA:</label>
            <input type="text" id="empresa" name="empresa" placeholder="EMPRESA...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" name="ruta" placeholder="NUMERO Ruta...">
            <label for="responsable">responsable Equipo:</label>
            <input type="text" id="responsable" name="responsable" placeholder="NOMBRE RESPONSABLE EQUIPO...">
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