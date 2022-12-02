<?php
include 'lib/lib.php';
include 'config/config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conexion = conexion(HOST, USER, PASSWORD, DATABASE);

if (isset($_POST['add']) && $_SESSION['perfil'] == 'admin') {
    $data["nombre_equipo"] = $_POST['nombre_equipo'];
    $data["descripcion"] = $_POST['descripcion'];
    $add_equipo = addEquipo($conexion, $data);
    if ($add_equipo) {
        header("Location: index.php");
    } else {
        echo "Error al añadir el equipo";
    }
}
// Vamos a comprobar si el usuario se ha registrado
if (isset($_SESSION['user'])) {
    echo "<h2>Usuario registrado</h2>";
    echo "<h3>Usuario: " . $_SESSION['user'] . "</h3>";
    echo "<a href='logout.php'><button>Logout</button></a>";
} else {
    echo "<h2>Usuario no registrado</h2>";
    echo "<a href='login.php'><button>Login</button></a>";
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