<?php
#Tablas de multiplicar del 1 al 10.
/**
 * @author abueno19
 */
$correctas = array();
$incorrectas = array();
$post = $_POST;
$respuesta = isset($post['enviar']);
/**
 * Comprobamos que se ha enviado el formulario
 * y que esta correcto el resultado 
 * separamos la key por la x y comprobamos que el resultado es correcto
 */
if ($respuesta){

    foreach ($post as $key => $value) {
        if ((( (int) explode("x",$key)[0] * (int)explode("x",$key)[1])) != $value) {
            array_push($incorrectas, $key);
        } else {
            array_push($correctas, $key);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="stylesheet" href="css/act6.css">
</head>

<body>
    <?php
    $primeraTabla = 1;
    echo ("<table class='tabla'>");
    $contador = 2;
    for ($i = 1; $i <= 10; $i++) {
        echo ("<tr>");
        echo ("<td>");
        echo ($i);
        echo ("</td>");
        echo ("<form method='post'>");
        for ($j = 1; $j <= 10; $j++) {
            echo ("<td>");
            if (rand(1, 3) == 1 && $contador != 0 && !$respuesta && $primeraTabla != 1) {
                echo ("<input name=".$i.'x'.$j. ">");
                $contador -= 1;
            } else {
                
                if ($respuesta && in_array($i."x".$j, $correctas)) {
                    echo ("<span class='bien'>" . $i * $j . "</span>");
                } else if ($respuesta && in_array($i."x".$j, $incorrectas)) {
                    echo ("<span class='mal'>" . $i * $j . "</span>");
                } else {
                    echo ($i * $j);
                }
            }

            echo ("</td>");
        }
        $primeraTabla = 0;
        $contador = 2;
        echo ("</tr>");
    }

    echo ("</table>");
    echo ("<input type='submit' value='enviar' name='enviar'>");
    echo ("<br>");
    echo ("<a href='https://github.com/abueno19/Und3_tarea1_DWES/blob/main/src/und3/tarea3/act6.php'>Github</a>");



    ?>

</body>

</html>