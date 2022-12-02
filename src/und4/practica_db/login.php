<?php
include 'lib/lib.php';
include 'config/config.php';
// iniciamos sesion
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vamos a crear un login para los uuarios
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $data["user"] = $user;
    $data["password"] = $password;
    $conexion = conexion(HOST, USER, PASSWORD, DATABASE);
    $login = login($conexion, $data);
    if ($login) {
        $_SESSION["perfil"] = "admin";
        $_SESSION['user'] = $user;
        header("Location: index.php");
    } else {
        echo "Error al logearse";
    }
}
// Vamos a comprobar si el usuario se ha registrado
if (isset($_SESSION['user'])) {
    echo "<h2>Usuario registrado</h2>";
    echo "<h3>Usuario: " . $_SESSION
['user'] . "</h3>";
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
        echo "<h2>Login</h2>";
        echo "<form  method='POST'>";
        echo "<input type='text' name='user' placeholder='User'>";
        echo "<input type='password' name='password' placeholder='Password'>";
        echo "<input type='submit' name='login' value='login'>";
        echo "</form>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        ?>
    
    </body>
</html>
