<?php
require_once 'control/controlUsuario.php';
require_once 'modelo/usuario.php';
$errores = "";
if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $tipoUsuario = $_POST['tUsuario'];

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores .= "Favor Ingresar su nombre completo";
    }

    if (!empty($usuario)) {
        $usuario = trim($usuario);
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
    } else {
        $errores .= "Ingrese su nombre de usuario";
    }

    if (!empty($contraseña)) {
        $contraseña = trim($contraseña);
        $contraseña = filter_var($contraseña, FILTER_SANITIZE_STRING);
    } else {
        $errores .= "Ingrese su contraseña";
    }

    if (!empty($tipoUsuario)) {
        $tipoUsuario = trim($tipoUsuario);
    } else {
        $errores .= "Seleccione un Tipo de Usuario";
    }

    if (!$errores) {
        $controlU = new controlUsuario();
        $modeloU = new usuario($nombre, $usuario, $contraseña, $tipoUsuario);
        $controlU->insertarUsuario($modeloU);
        echo '<script type="text/javascript">alert("Usuario Registrado con Exito!")</script>';
    } else {
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
    <title>Equipos</title>
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
    <header class="contenedor">
        <div class="barra contenedor">
            <div class="titulo">
                <h1>Registro Usuarios</h1>
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
                        </ul>
                    </li>
                    <li> <a href="">Control<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="envioMantenimiento.php">Envió Mantenimiento</a></li>
                            <li><a href="mantenimiento.php">Registro Mantenimiento</a></li>
                            <li><a href="mantenimientoCierre.php">Cierre Mantenimiento</a></li>
                            <li><a href="vSiniestroRobo.php">Siniestro</a></li>
                            <li><a href="devolucionEquipos.php">Devolucion Equipos</a></li>
                        </ul>
                    </li>
                    <li><a href="">Reportes<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="reporteSura.php">Reporte Aseguradora</a></li>
                        </ul>
                    </li>
                    <li><a href="info_soporte.php">Info-Soporte</a></li>
                    <li><a href="">Informes<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li> <a href="informeEquipo.php">Consulta Equipos</a></li>
                            <li><a href="infoImpresora.php">Consulta Impresoras</a></li>
                            <li><a href="informeEnvioM.php">Consulta Envios Soporte</a></li>
                            <li><a href="InformeEquiposS.php">Consulta Casos Soporte</a></li>
                            <li><a href="informeAsignado.php">Consulta Equipos Asignados</a></li>
                        </ul>
                </ul>
            </nav>
        </div>
    </header>


    <form method="POST" class="contenedor">
        <fieldset class="contenedor seccion-equipo">
            <legend>Usuarios</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre...">
            <label for="usuario">usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario..">
            <label for="contraseña">Contraseña:</label>
            <input type="text" id="contraseña" name="contraseña" placeholder="Contraseña...">
            <label for="tUsuario">Tipo usuario:</label>
            <select name="tUsuario" id="tUsuario">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="1">Administrador</option>
                <option value="0">Usuario</option>
            </select>
            <input type="submit" value="enviar" name="enviar" class="boton">

        </fieldset>

        <div class="errores">
            <pre>
                <p><? $errores ?></p>
            </pre>
        </div>
    </form>
    <footer class="contenedor">
        <div class="footer">
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>