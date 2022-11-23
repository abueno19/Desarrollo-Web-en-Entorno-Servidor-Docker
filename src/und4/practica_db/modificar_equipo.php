<?php
include 'lib/lib.php';
include 'config/config.php';
// vamos a recoger el metodo get de la url que es id
$conexion = conexion($host, $user, $password, $database);
$id = $_GET['id'];

if (isset($_POST['accion'])) {
    try{
        update_equipo($conexion, $id, $_POST['nombre_equipo'], $_POST['descripcion']);
        header("Location: index.php");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    
}
// vamos a buscar el equipo por la id que nos llega por GET



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
        // Vamos a mostrar un menu capaz de modificar el equipo con esa id  si es get
        if (!isset($_POST['accion'])) {
            echo "<h2>Modificar Equipo</h2>";
            echo "<form action='modificar_equipo.php?id=$id' method='POST'>";
            echo "<input type='text' name='nombre_equipo' placeholder='Nombre equipo' value='".$equipo['nombre_equipo']."'>";
            echo "<input type='text' name='descripcion' placeholder='Descripcion' value='".$equipo['descripcion']."'>";
            echo "<input type='submit' name='accion' value='modificar'>";
            echo "</form>";
        }

    ?>
    </body>
</html>