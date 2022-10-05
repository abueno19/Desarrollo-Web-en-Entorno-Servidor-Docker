<?php
/**
 * Unidad3 tarea 2
 * @author Antonio Julian Bueno Fuentes
 * Vamos a crear un switch para saber los dias de un mes
 */
$mes=1;
$dia=0;
switch ($mes) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        $dia=31;
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        $dia=30;
        break;
    default:
        $dia=29;
        break;
}
echo('El mes numero '.$mes.' y tiene '.$dia.' dias ' );
salto_de_linea();
echo("<a href='https://github.com/abueno19/Und3_tarea1_DWES'>Github</a>");
function salto_de_linea(){
    echo("<br></br>");
}


?>