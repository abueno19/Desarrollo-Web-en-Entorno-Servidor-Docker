<?php
include 'lib/lib.php';
include 'config/config.php';
$conexion = conexion(HOST, USER, PASSWORD, DATABASE);

if (isset($_POST['add'])) {
    $nombre_equipo = $_POST['nombre_equipo'];
    $descripcion = $_POST['descripcion'];
    $add_equipo = add_equipo($conexion, $nombre_equipo, $descripcion);
    if ($add_equipo) {
        header("Location: index.php");
    } else {
        echo "Error al añadir el equipo";
    }
}
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
        <?php
        // Vamos a mostrar un menu para crear un equipo
        echo "<h2>ADD Equipo</h2>";
        echo "<form  method='POST'>";
        echo "<input type='text' name='nombre_equipo' placeholder='Nombre equipo'>";
        echo "<input type='text' name='descripcion' placeholder='Descripcion'>";
        echo "<input type='submit' name='add' value='add'>";
        echo "</form>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        ?>
    
    </body>
</html>