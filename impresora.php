<?php
    $errores = '';
    if(isset($_POST['enviar'])){
        $tImpresora = $_POST['tImpresora'];
        $serial = $_POST['serial'];
        $estado = $_POST['estado'];
        $observaciones = $_POST['observaciones'];
        
        //validando tipo impresora
        if($tImpresora == ""){
            $errores .= 'Debe Seleccionar Un Tipo de Impresora';
        }
        //validando serial
        if(!empty($serial)){
            $serial = trim($serial);
            $serial = filter_var($serial, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Debe Ingresar el Serial';
        }
        //validando estado
        if(!empty($estado)){
            $estado = trim($estado);
            $estado = filter_var($estado, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Ingrese El Estado Del Equipo';
        }
        //validando Observaciones
        if(!empty($observaciones)){
            $observaciones = trim($observaciones);
            $observaciones = filter_var($observaciones, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Ingrese observaciones del equipo';
        }

        
        if(!$errores){
            require_once 'modelo/mImpresora.php';
            require_once 'control/controlImpresora.php';

            $impresora = new impresora($tImpresora, $serial, $estado, $observaciones);
            $impresoraControl = new controlImpresora();
            $impresoraControl->registroImpresora($impresora);
            echo '<script type="text/javascript"> alert("Registro Generado con Exito") </script>';
        }
      
    }
      //consultando el tipo de impresora para llevarlo al select
      require_once 'control/controlImpresora.php';
      $controlImpresora = new controlImpresora();
      $tipo = $controlImpresora->consultaTImpresora();
      
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
    <link rel="shortcut icon" href="favicon.ico" />
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
            <a href="#"><i class="fas fa-search"></i></a>
        </div>
        <form method="post">
        <fieldset class="seccion-equipo print">
            <legend>Impresoras</legend>
            <label for="tImpresora">Tipo Impresora:</label>
            <select name="tImpresora" id="tImpresora" >
                <option value="" disabled selected>Seleccione</option>
                <?php foreach($tipo as $im): ?>
                <option value="<?php echo $im->tipo ?>"><?php echo $im->tipo ?></option>
                <?php endforeach;?>
            </select>
            <label for="serial">serial:</label>
            <input type="text" id="serial" name="serial" placeholder="Serial...">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" placeholder="Estado...">
            <label for="observacones">observaciones:</label>
            <textarea name="observaciones" id="observaciones"></textarea>
            <input type="submit" value="enviar" name="enviar" class="boton">

        </fieldset>
        </form>
        <footer class="contenedor">
            <div class="footer">
                <p class="copyright">Todos los Derechos Reservados &copy; </p>
            </div>
        </footer>
</body>

</html>