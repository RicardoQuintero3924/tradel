<?php
    require_once 'control/controlUsuario.php';
    $controlUsuario = new controlUsuario();
    $usuario = $controlUsuario->buscarUsuario();
    //var_dump($usuario);

    foreach($usuario as $user){    
        $nombre = $user->nombre;
        $cuenta = $user->usuario;
        $contraseña = $user->contraseña;
    }
    $errores = '';
    $frm_enviado = false;
    if(isset($_POST['btn_login'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['clave'];

        if(!empty($usuario)){
            $usuario = trim($usuario);
            $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Ingrese el usuario';
        }
        if(!empty($password)){
            $password = trim($clave);
            $password = filter_var($clave, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Ingrese su Contraseña';
        }
    }


    var_dump($cuenta);
    var_dump($contraseña);

    $contra = 'ricardo121';

    if ($contraseña === $contra){
        echo "la contraseña es igual";
    }else{
        echo "las contraseñas son diferentes";
    }
    

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="js/main.js">
    <title>Zebra Tradel</title>
</head>

<body>
    <form action="" class="login">
        <div class="credenciales">
            <h1>TRADEL</h1>
            <h2>Login:</h2>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingrese su Usuario">

            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" placeholder="Ingrese su Contraseña">

            <input type="submit" value="enviar" class="btn" name="btn_login">
            
        </div>
    </form>

</body>

</html>