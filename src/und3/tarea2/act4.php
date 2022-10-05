<?php
Paleta_de_colore_cada_uno_con_su_valor_hexadecimal();
function Paleta_de_colore_cada_uno_con_su_valor_hexadecimal(){
    if(!$_GET){
        echo("<table border='1'>");
        for ($i=0; $i <=255 ; $i++) { 
            echo("<tr>");
            for ($j=0; $j <=255 ; $j++) { 
                echo("<td style='background-color: #".$i.$j."'>");
                echo('<a href="./act4?color='.$i.$j."\">".$i.$j."</a>");
                
                echo("</td>");
            }
            echo("</tr>");
        }
        echo("</table>");
    }
 
}

function Recoge_El_get_de_la_url_y_devuelvelo(){
    return($_GET["color"]);
}
Pon_el_fondo_de_la_pagina_con_el_color_que_sea(Recoge_El_get_de_la_url_y_devuelvelo());
function Pon_el_fondo_de_la_pagina_con_el_color_que_sea($i){
    echo("<style>body{background-color: #".$i.";}</style>");
}







echo("<a href='https://github.com/abueno19/Und3_tarea1_DWES/blob/main/Tarea2/act4/index.php'>Github</a>");




?>