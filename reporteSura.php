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
    </header>
    <div class="evento">
        <div class="title contenedor">
            <h2>Reporte Sura</h2>
            <!-- <div class="select ">
                <a href="#robo">Robo</a>
                <a href="#daño">Daño</a>
            </div> -->
            <div class="icon contenedor">
                <a href="siniestro.html"><i class="far fa-hand-point-left"></i></a>
                <a href="#"><i class="fas fa-search"></i></a>
            </div>
        </div>

        <fieldset id="robo" class="contenedor seccion-equipo info  clearflix">
            <legend>Robo</legend>
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
                <input type="submit" class="boton">
            </div>

        </fieldset>

        <fieldset id="daño" class="contenedor seccion-equipo info  clearfix">
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

        </fieldset>


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