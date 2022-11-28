<?php
include 'lib/lib.php';
include 'config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// vamos a recoger el metodo get de la url que es id
$conexion=conexion(HOST, USER, PASSWORD, DATABASE);
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $equipo=getEquiposById($conexion,$id);
}

if (isset($_POST['modificar']) && $_SESSION['user'] == 'admin') {
    $data["nombre_equipo"] = $_POST['nombre_equipo'];
    $data["descripcion"] = $_POST['descripcion'];
    $data["id"] = $_POST['id'];
    $modificar_equipo = updateEquipo($conexion, $data);
    if ($modificar_equipo) {
        header("Location: index.php");
    } else {
        echo "Error al modificar el equipo";
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