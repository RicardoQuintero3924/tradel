<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Siniestros</title>
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
        <a href="index.php"><i class="far fa-hand-point-left"></i></a>
        <a href="reporteSura.php"><i class="fas fa-book"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>
    <form action="equipo" class="contenedor">

        <fieldset class="contenedor seccion-equipo">
            <legend>siniestros</legend>
            <label for="Tp">Tipo Equipo:</label>
            <select name="tp" id="tp">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="tc25">TC25</option>
                <option value="zq110">ZQ110</option>
            </select>
            <label for="Ts">Tipo Siniestro:</label>
            <select name="tp" id="tp">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="robo">Robo</option>
                <option value="daño">Daño</option>
            </select>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" placeholder="IMEI EQUIPO...">
            <label for="serial">serial:</label>
            <input type="text" id="serial" placeholder="SERIAL EQUIPO..">
            <label for="fecha">fecha siniestro:</label>
            <input type="text" id="fecha" placeholder="DD-MM-AAAA">
            <label for="empresa">eMPRESA:</label>
            <input type="text" id="empresa" placeholder="EMPRESA...">
            <label for="ruta">Ruta:</label>
            <input type="text" id="ruta" placeholder="NUMERO Ruta...">
            <label for="nombre">nombre:</label>
            <input type="text" id="ciudad" placeholder="NOMBRE RESPONSABLE RUTA...">


        </fieldset>
        <input type="submit" value="enviar" class="boton">
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>