<?php
include 'lib/lib.php';
include 'config/config.php';
// vamos a recoger el metodo get de la url que es id
$conexion=conexion(HOST, USER, PASSWORD, DATABASE);
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $equipo=search_equipo($conexion,$id);
}

if (isset($_POST['modificar'])) {
    $nombre_equipo = $_POST['nombre_equipo'];
    $descripcion = $_POST['descripcion'];
    $modificar_equipo = update_equipo($conexion, $id, $nombre_equipo, $descripcion);
    if ($modificar_equipo) {
        header("Location: index.php");
    } else {
        echo "Error al modificar el equipo";
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
    // Vamos a mostrar un menu para modificar un equipo
    echo "<h2>Modificar Equipo</h2>";
    echo "<form  method='POST'>";
    echo "<input type='text' name='nombre_equipo' value='".$equipo['nombre_equipo']."'>";
    echo "<input type='text' name='descripcion' value='".$equipo['descripcion']."'>";
    echo "<input type='hidden' name='id' value='".$equipo['id']."'>";
    echo "<input type='submit' name='modificar' value='modificar'>";
    echo "</form>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    ?>
    </body>
</html>