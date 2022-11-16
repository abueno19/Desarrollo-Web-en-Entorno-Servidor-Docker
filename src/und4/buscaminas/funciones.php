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
                        if ($tablero[$i - 1][$j - 1] != 9) {
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
function expandir($tablero, $fila, $columna,$vista)
{
    // En esta funcion vamos a expandir las casillas de vista teniendo tablero como referencia
    // Si fila y columna es 0 exapndimos la casilla
    if ($fila >= 0 && $columna >= 0 && $fila < count($tablero) && $columna < count($tablero[0])) {
        if ($vista[$fila][$columna] == 0) {
            if($tablero[$fila][$columna] != 9 && $tablero[$fila][$columna] != 0){
                $vista[$fila][$columna] = $tablero[$fila][$columna];
            }else{
                $vista[$fila][$columna] = -1;
            }
            if ($tablero[$fila][$columna] == 0 && $vista[$fila][$columna] == -1) {
                $vista = expandir($tablero, $fila - 1, $columna - 1, $vista);
                $vista = expandir($tablero, $fila - 1, $columna, $vista);
                $vista = expandir($tablero, $fila - 1, $columna + 1, $vista);
                $vista = expandir($tablero, $fila, $columna - 1, $vista);
                $vista = expandir($tablero, $fila, $columna + 1, $vista);
                $vista = expandir($tablero, $fila + 1, $columna - 1, $vista);
                $vista = expandir($tablero, $fila + 1, $columna, $vista);
                $vista = expandir($tablero, $fila + 1, $columna + 1, $vista);
            }
        }
    }
    return $vista;



    
}
?>