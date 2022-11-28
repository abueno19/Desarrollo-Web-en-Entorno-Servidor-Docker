<?php
include 'lib/lib.php';
include 'config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// vamos a borrar el equipo por la id que nos llega por GET
$conexion = conexion(HOST, USER, PASSWORD, DATABASE);
if (isset($_POST['id']) && $_SESSION['user'] == 'admin') {
    $id = $_POST['id'];
    $borrar_equipo = deleteEquipo($conexion, $id);
    if ($borrar_equipo) {
        header("Location: index.php");
    } else {
        echo "Error al borrar el equipo";
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
    <!-- Formulario para confirmar que quieres borrar ese equipo -->
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" name="borrar" value="borrar">

</body>

</html>