<?php
#Tablas de multiplicar del 1 al 10.
TablasDEMultiplicar1_10_en_una_sola_tabla ();# Podme las tablas con su cabezera correspondiente
#Dame estylo a la tabla aumentando el tamaño de la letra y el ancho de la tabla y el color de fondo
echo("<style>table,th,td{border: 1px solid black;}</style>");
echo("<style>table{width: 100%;}</style>");
echo("<style>table{background-color: #f1f1c1;}</style>");
echo("<style>table{font-size: 20px;}</style>");
echo("<style>table{font-family: monospace;}</style>");
echo("<style>table{font-weight: bold;}</style>");
echo("<style>table{color: #ff0000;}</style>");




function TablasDEMultiplicar1_10_en_una_sola_tabla (){
    echo("<table border='1'>");
    for ($i=1; $i <=10 ; $i++) { 
        echo("<tr>");
        echo("<td>");
        echo($i);
        echo("</td>");
        for ($j=1; $j <=10 ; $j++) { 
            echo("<td>");
            echo($i*$j);
            echo("</td>");
        }
        echo("</tr>");
    }
    echo("</table>");
}

#Tablas de multiplicar del 1 al 10.



echo("<a href='https://github.com/abueno19/Und3_tarea1_DWES/blob/main/Tarea2/act3/index.php'>Github</a>");
?>