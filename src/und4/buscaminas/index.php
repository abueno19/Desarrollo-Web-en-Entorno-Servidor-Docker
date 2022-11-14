<?php
// Vamos a crear un buscaminas
// Primero vamos a crear una funcion que nos devuelva un array del tamaño que le pasemos para el buscaminas
function crear_tablero($filas, $columnas, $minas)
{
    // En el array el valor 9 significa que hay una mina
    // El valor 0 significa que no hay mina
    // El valor 1 significa que hay una mina alrededor
    // El valor 2 significa que hay dos minas alrededor
    // El valor 3 significa que hay tres minas alrededor
    // El valor 4 significa que hay cuatro minas alrededo
    // El valor 5 significa que hay cinco minas alrededor
    // El valor 6 significa que hay seis minas alrededor
    // El valor 7 significa que hay siete minas alrededor
    // El valor 8 significa que hay ocho minas alrededor
    // El valor 9 significa que hay una mina
    

    // Creamos un array de 0
    $tablero = array_fill(0, $filas, array_fill(0, $columnas, 0));
    // Ahora vamos a poner las minas
    for ($i = 0; $i < $minas; $i++) {
        $fila = rand(0, $filas - 1);
        $columna = rand(0, $columnas - 1);
        $tablero[$fila][$columna] = 9;
    }
    // Ahora vamos a contar las minas alrededor
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            if ($tablero[$i][$j] == 9) {
                // Si hay una mina, vamos a contar las minas alrededor
                // Primero vamos a comprobar que no estamos en la primera fila
                if ($i > 0) {
                    // No estamos en la primera fila
                    // Comprobamos que no estamos en la primera columna
                    if ($j > 0) {
                        // No estamos en la primera columna
                        // Comprobamos que no hay una mina
                        if ($tablero[$i - 1][$j - 1] != 4) {
                            // No hay una mina
                            $tablero[$i - 1][$j - 1]++;
                        }
                    }
                    // Comprobamos que no hay una mina
                    if ($tablero[$i - 1][$j] != 9) {
                        // No hay una mina
                        $tablero[$i - 1][$j]++;
                    }
                    // Comprobamos que no estamos en la ultima columna
                    if ($j < $columnas - 1) {
                        // No estamos en la ultima columna
                        // Comprobamos que no hay una mina
                        if ($tablero[$i - 1][$j + 1] != 9) {
                            // No hay una mina
                            $tablero[$i - 1][$j + 1]++;
                        }
                    }
                }
                // Comprobamos que no estamos en la primera columna
                if ($j > 0) {
                    // No estamos en la primera columna
                    // Comprobamos que no hay una mina
                    if ($tablero[$i][$j - 1] != 9) {
                        // No hay una mina
                        $tablero[$i][$j - 1]++;
                    }
                }
                // Comprobamos que no estamos en la ultima columna
                if ($j < $columnas - 1) {
                    // No estamos en la ultima columna
                    // Comprobamos que no hay una mina
                    if ($tablero[$i][$j + 1] != 9) {
                        // No hay una mina
                        $tablero[$i][$j + 1]++;
                    }
                }
                // Comprobamos que no estamos en la ultima fila
                if ($i < $filas - 1) {
                    // No estamos en la ultima fila
                    // Comprobamos que no estamos en la primera columna
                    if ($j > 0) {
                        // No estamos en la primera columna
                        // Comprobamos que no hay una mina
                        if ($tablero[$i + 1][$j - 1] != 9) {
                            // No hay una mina
                            $tablero[$i + 1][$j - 1]++;
                        }
                    }
                    // Comprobamos que no hay una mina
                    if ($tablero[$i + 1][$j] != 9) {
                        // No hay una mina
                        $tablero[$i + 1][$j]++;
                    }
                    // Comprobamos que no estamos en la ultima columna
                    if ($j < $columnas - 1) {
                        // No estamos en la ultima columna
                        // Comprobamos que no hay una mina
                        if ($tablero[$i + 1][$j + 1] != 9) {
                            // No hay una mina
                            $tablero[$i + 1][$j + 1]++;
                        }
                    }
                }
            }
        }
    }
    return $tablero;
}


// Vamos a crear _SESSIONes si no existe
// Creamos las _SESSIONes
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST["reiniciar"])){
    // Vamos a reiniciar el juego
    // Borramos las _SESSIONes
    session_destroy();
    // Creamos las _SESSIONes
    if(!isset($_SESSION)){
        session_start();
    }

}


// Vamos a crear el tablero y guardar la vista en un array ademas de que va a ser un formulario y la vista va a ser un input
if (!isset($_SESSION['tablero'])) {
    // No existe el tablero
    // Creamos el tablero
    $_SESSION['tablero'] = crear_tablero(10, 10, 10);
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