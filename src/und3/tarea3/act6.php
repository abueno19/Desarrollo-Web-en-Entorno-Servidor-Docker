<?php
#Tablas de multiplicar del 1 al 10.
if(!$_POST){
    TablasDEMultiplicar1_10_en_una_sola_tabla();
}
else{
    foreach($_POST as $key => $value){
        if($key!=$value){
            echo("<p>Has puesto $value pero es $key</p>");
        }
    }
}
echo("<style>table,th,td{border: 1px solid black;}</style>");
echo("<style>table{width: 100%;}</style>");
echo("<style>table{background-color: #f1f1c1;}</style>");
echo("<style>table{font-size: 20px;}</style>");
echo("<style>table{font-family: monospace;}</style>");
echo("<style>table{font-weight: bold;}</style>");
echo("<style>table{color: #ff0000;}</style>");




function TablasDEMultiplicar1_10_en_una_sola_tabla (){
    echo("<table border='1'>");
    $contador=2;
    for ($i=1; $i <=10 ; $i++) { 
        echo("<tr>");
        echo("<td>");
        echo($i);
        echo("</td>");
        echo("<form method='post'>");
        for ($j=1; $j <=10 ; $j++) { 
            echo("<td>");
            if (rand(1,2)==1 && $contador!=0){
                echo('<input name='.$i*$j.'>');
                $contador-=1;
            }
            else{
                echo($i*$j);
            }
            
            echo("</td>");
        }
        $contador=2;
        echo("</tr>");
    }
    
    echo("</table>");
    echo("<input type='submit' value='Enviar'>");
    echo("<br>");
}

#Tablas de multiplicar del 1 al 10.



echo("<a href='https://github.com/abueno19/Und3_tarea1_DWES/blob/main/Tarea2/act3/index.php'>Github</a>");
?>