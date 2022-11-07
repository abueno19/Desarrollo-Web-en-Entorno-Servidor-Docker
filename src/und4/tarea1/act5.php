<?php
// Si la sesio no existe, la creamos
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['inicioTime'] = time();
    $_SESSION['intervaloTime'] = 5;
    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
    }
    
}

if (isset($_SESSION['inicioTime'])) {
    $tiempo_transcurrido = time();
    $tiempo_maximo = $_SESSION["inicioTime"] + ($_SESSION['intervaloTime'] * 10);
    $_SESSION["contador"]++;
    if ($tiempo_transcurrido > $tiempo_maximo) {
        // cerar sesion
        session_destroy();

    }else {
        $_SESSION['inicioTime'] = time();
    }
}
else {
    $_SESSION['inicioTime'] = time();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "Tiempo de inicio: " . $_SESSION['contador'];
    ?>

</body>
</html>