<?php
/**
 *  @autor:  Antonio Julian Bueno Fuentes
 */
/* usar methodo post para enviar datos */
echo($_method);
if ($_POST){
    echo $_POST['nombre'];
}
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <form  method="post">
        <input type="text" name="nombre" placeholder="Nombre"/>
        <input type="text" name="apellidos" placeholder="Apellidos"/>
        <input type="submit" value="Enviar"/>

    </form>
    </body>
</html>