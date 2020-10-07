<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Equipos</title>
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
        <a href="impresora.php"><i class="fas fa-print"></i></a>
        <a href="asignacion.php"><i class="fas fa-address-book"></i></a>
        <a href="#"><i class="fas fa-pencil-alt"></i></a>
        <a href="comodato.php"><i class="far fa-file-alt"></i></a>
        <a href="#"><i class="fas fa-search"></i></a>
    </nav>
    <form action="equipo" class="contenedor">

        <fieldset class="contenedor seccion-equipo">
            <legend>Equipos</legend>
            <label for="Tp">Tipo Equipo:</label>
            <select name="tp" id="tp">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="tc25">TC25</option>
                <option value="zq110">ZQ110</option>
            </select>
            <label for="imei">IMEI:</label>
            <input type="text" id="imei" placeholder="IMEI EQUIPO...">
            <label for="serial">serial:</label>
            <input type="text" id="serial" placeholder="SERIAL EQUIPO..">
            <label for="sim">Numero Sim:</label>
            <input type="text" id="sim" placeholder="NUMERO SIM...">
            <label for="ciudad">CIUDAD:</label>
            <input type="text" id="ciudad" placeholder="CIUDAD...">
            <label for="aplicaciones">Aplicaciones Instaladas:</label>
            <div class="aplicaciones">
                <label for="ehs">ehs:</label><input type="radio" id="ehs" value="ehs" name="ehs" class="ehs">
                <label for="celuweb" class="celuweb">Celuweb:</label><input type="radio" id="celuweb" value="celuweb" name="celuweb" class="ehs">
            </div>
            <label for="estado">Estado:</label>
            <div class="estado">
                <label for="disponible">Disponible:</label><input type="radio" id="disponible" value="" name="disponible">
                <label for="cargador">Cargador:</label><input type="radio" id="cargador" value="" name="cargador">
                <label for="comodato">Comodato:</label><input type="radio" id="comodato" value="" name="comodato">
                <label for="comodato">Impresora:</label><input type="radio" id="impresora" value="" name="impresora">
            </div>

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