<?php
sumar_los_primeros_numero_pares(6);
function sumar_los_primeros_numero_pares($numero){
    $suma=0;
    for ($i=0; $i <= $numero; $i++) { 
        if ($i%2==0) {
            $suma+=$i;
        }
    }
    echo($suma);
    saltodelinea();
}
function saltodelinea(){
    echo("<br></br>");
}
    echo("<a href='https://github.com/abueno19/Und3_tarea1_DWES'>Github</a>");

?>