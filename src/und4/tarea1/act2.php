<?php
// Escriba una página que compruebe si el navegador permite crear cookies y se lo diga al usuario
// (mediante una o más páginas).
if (isset($_POST["enviar"])){
    if (isset($_COOKIE["nombre"])){
        echo "La cookie se ha creado";
        echo "<br>";
        echo "El valor de la cookie es: ".$_COOKIE["nombre"];
        echo "<br>";
    }else{
        echo "La cookie no existe";
    }
        
}else{
    setcookie("nombre", "valor", time()+3600);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Prueba</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        <?php
        if(!isset($_POST["enviar"])){
            echo("<form method='post'>");
            echo("<input type='submit' name='enviar' value='Enviar'>");
            
            echo("</form>");
        }
        
        ?>
        <!-- <form method="post">
            <input type="submit" name="enviar" value="Enviar">
        </form> -->
    
    </body>
</html>
