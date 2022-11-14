<?php
include 'funciones.php';
include 'sesiones.php';
include 'config.php';





// Vamos a crear el tablero y guardar la vista en un array ademas de que va a ser un formulario y la vista va a ser un input
if (!isset($_SESSION['tablero'])) {
    // No existe el tablero
    // Creamos el tablero
    $_SESSION['tablero'] = crear_tablero($filas, $columnas, $minas);
    // Creamos la vista
    $_SESSION['vista'] = array_fill(0, 10, array_fill(0, 10, 0));
    // Creamos el formulario
    $_SESSION['formulario'] = array_fill(0, 10, array_fill(0, 10, 0));
}

// Vamos a comprobar si se ha pulsado un boton
if (isset($_POST['fila']) && isset($_POST['columna'])) {
    // Se ha pulsado un boton
    // Comprobamos si hay una mina
    if ($_SESSION['tablero'][$_POST['fila']][$_POST['columna']] == 9) {
        // Hay una mina
        // Mostramos el tablero
        $_SESSION['vista'] = $_SESSION['tablero'];
        // Mostramos el mensaje
        echo "<h1>Has perdido</h1>";
    } else {
        // No hay una mina
        // Mostramos el valor
        if($_SESSION['tablero'][$_POST['fila']][$_POST['columna']] == 0){
            $_SESSION['vista'][$_POST['fila']][$_POST['columna']] = -1;
        }else{

            $_SESSION['vista'][$_POST['fila']][$_POST['columna']] = $_SESSION['tablero'][$_POST['fila']][$_POST['columna']];
        }
        // Comprobamos si hemos ganado
        $ganado = true;
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                if ($_SESSION['vista'][$i][$j] == 0 && $_SESSION['tablero'][$i][$j] != 9) {
                    $ganado = false;
                }
            }
        }
        if ($ganado) {
            // Mostramos el tablero
            $_SESSION['vista'] = $_SESSION['tablero'];
            // Mostramos el mensaje
            echo "Has ganado";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    // Vamos a crear la vista
    echo "<table>";
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            echo "<td>";
            if ($_SESSION['vista'][$i][$j] == 0 && $_SESSION['estado'] != "perdido") {
                // No se ha pulsado
                echo "<form action='index.php' method='post'>";
                echo "<input type='hidden' name='fila' value='$i'>";
                echo "<input type='hidden' name='columna' value='$j'>";
                echo "<input type='submit' value=''>";
                echo "</form>";
            }
            else {
                // Se ha pulsadoº
                if ($_SESSION['vista'][$i][$j] == 9) {
                    // Hay una mina
                    echo "<img src='https://i.pinimg.com/736x/6a/f3/ca/6af3ca4e028a801d96e3f0b6182b47d0.jpg' w>";
                    $_SESSION['estado'] = "perdido";
                }else if($_SESSION['vista'][$i][$j] == -1){
                    echo "0";
                }
                else {
                    // No hay una mina
                    echo $_SESSION['vista'][$i][$j];
                }
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    // Vamos a crear un boton para reiniciar el juego
    echo "<form action='index.php' method='post'>";
    echo "<input type='hidden' name='reiniciar' value='1'>";
    echo "<input type='submit' value='Reiniciar'>";
    echo "</form>";

    



    ?>

</body>

</html>