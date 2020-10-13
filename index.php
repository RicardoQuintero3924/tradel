<?php
$errores = '';
$frm_enviado = false;

if (isset($_POST['btn_login'])) {
    
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if (!empty($usuario)) {
        $usuario = trim($usuario);
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Ingrese Su Usuario </br>';
    }
    if (!empty($clave)) {
        $clave = trim($clave);
        $clave = filter_var($clave, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Ingrese su Contraseña';
    }

    require_once 'control/controlUsuario.php';
    $controlUsuario = new controlUsuario();
    $users = $controlUsuario->buscarPorUsuario($usuario);

    

    foreach ($users as $user) {
        
        $password = $user->contraseña;
    }

    if (($clave === $password)) {
        header('location:paginaPrincipal.php');
    } else {
       echo 'Ingrese Su Contraseña Correctamente';
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Zebra Tradel</title>
</head>

<body>
    <form action="" method="post" class="login">
        <div class="credenciales">
            <h1>TRADEL</h1>
            <h2>Login:</h2>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingrese su Usuario">

            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" placeholder="Ingrese su Contraseña">

            <input type="submit" value="ingresar" class="btn" name="btn_login">
            <div class="error">
                <pre>
                <?php echo $errores; ?>
                </pre>
            </div>
        </div>
    </form>

</body>

</html>