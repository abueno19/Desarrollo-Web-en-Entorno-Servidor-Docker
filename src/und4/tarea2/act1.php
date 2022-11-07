<?php
/*
Metodo que recibe un archivo y lo guarda en el servidor
*/
if (!isset($_FILES['archivo'])) {
    echo "No se ha recibido ningun archivo";
} else {
    $archivo = $_FILES['archivo']['tmp_name'];
    $nombre = $_FILES['archivo']['name'];
    $ruta = "/var/www/html/archivos/";
    // si no existe la carpeta la creamos
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    $ruta = $ruta . $nombre;
    // guardar archivo

   
    if (move_uploaded_file($archivo, $ruta)) {
        echo "El archivo es válido y se subió con éxito.";
    } else {
        echo "¡Posible ataque de subida de ficheros!";
    }
    
}
// Mostrar los archivos de la carpeta y si es imagen mostrarla






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
        <form  method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" id="archivo">
            <input type="submit" value="Enviar">
            <?php 
            echo ("<br>");
            
            $ruta = "/var/www/html/archivos/";
            $archivos = scandir($ruta);
            foreach ($archivos as $archivo) {
                if ($archivo != "." && $archivo != "..") {
                    echo ("<a href='../../archivos/$archivo'>$archivo</a>");
                    echo ("<br>");
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                    if ($extension == "jpg" || $extension == "png" || $extension == "gif") {
                        echo ("<img src='../../archivos/$archivo'>");
                        echo ("<br>");
                    }
                }
            }
            
            
            ?>
        </form>
    
    </body>
</html>