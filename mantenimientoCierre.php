<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Mantenimiento</title>
</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>control de Equipos</h1>
            </div>
        </div>
    </header>
    <nav class="icono contenedor">
        <a href="paginaPrincipal.php"><i class="far fa-hand-point-left"></i></a>
        <a href="#"><i class="fas fa-pencil-alt"></i></a>
        <a href="#"><i class="far fa-file-alt"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>
    <div class="filtro">
        <fieldset class="contenedor">
        <legend>CASO:</legend>
        <input type="text" id="caso" name="caso" placeholder="CASO...">
        <input type="submit" name="consultar" value="Consultar" class="btnfiltro">
        </fieldset>
    </div>
    <form method="POST" class="contenedor" style="display: none;">

        <fieldset class="contenedor seccion-equipo">
            <legend>Mantenimiento</legend>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" name="imei" placeholder="IMEI EQUIPO...">
            <label for="fecha">fecha envio:</label>
            <input type="date" id="fecha" name="fEnvio" placeholder="FECHA ENVIO...">
            <label for="costo">COSTO:</label>
            <input type="text" id="costo" name="costo" placeholder="COSTO MANTENIMIENTO...">
            <label for="caso">CASO:</label>
            <input type="text" id="caso" name="caso" placeholder="CASO...">
            <label for="estado[]">Estado:</label>
            <div class="aplicaciones">
                <label for="estado">Enviado:</label><input type="checkbox" id="enviado" value="enviado" name="estado[]" class="ehs">
                <label for="estado" class="cotizacion">Cerrado:</label><input type="checkbox" id="cerrado" value="cerrado" name="estado[]" class="ehs">
            </div>
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