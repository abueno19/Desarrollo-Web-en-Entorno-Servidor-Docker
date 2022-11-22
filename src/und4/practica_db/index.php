<?php
include 'lib.php';
include 'config.php';
$conexion = conexion($host, $user, $password, $database);
// Vamos a crear las colunmas nombre_equipo

$conexion->exec("CREATE TABLE IF NOT EXISTS equipos(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_equipo VARCHAR(30) NOT NULL UNIQUE,
    descripcion VARCHAR(30) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");



// Vamos a mostrar los equipos que hay en la base de datos
$consulta = $conexion->query("SELECT * FROM equipos");



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
    <?php
    // Vamos a mostrar los equipos que hay en la base de datos ademas de dar opciones de añadir ,modificar y borrar

    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        // Vamos a mostrar los equipos en una tabla
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre equipo</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Fecha creacion</th>";
        echo "<th>Modificar</th>";
        echo "<th>Borrar</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $fila["nombre_equipo"] . "</td>";
        echo "<td>" . $fila["descripcion"] . "</td>";
        echo "<td>" . $fila["fecha_creacion"] . "</td>";
        echo "<td><a href='modificar_equipo.php?id=" . $fila["id"] . "'>Modificar</a></td>";
        echo "<td><a href='borrar_equipo.php?id=" . $fila["id"] . "'>Borrar</a></td>";
        echo "</tr>";
        echo "</table>";
    }
    // Vamos a crear un formulario para añadir equipos
    echo "<h2>Añadir Equipo</h2>";
    echo "<form  method='POST'>";
    echo "<input type='text' name='nombre_equipo' placeholder='Nombre equipo'>";
    echo "<input type='text' name='descripcion' placeholder='Descripcion'>";
    echo "<input type='submit' name='accion' value='añadir'>";
    echo "</form>";



    // Vamos a comprobar si se ha pulsado el boton añadir
    if (isset($_POST["accion"]) && $_POST["accion"] == "añadir") {
        // Vamos a añadir los datos a la base de datos
        $consulta = $conexion->prepare("INSERT INTO equipos (nombre_equipo,descripcion) VALUES (:nombre_equipo,:descripcion)");
        $consulta->bindParam(":nombre_equipo", $_POST["nombre_equipo"]);
        $consulta->bindParam(":descripcion", $_POST["descripcion"]);
        $consulta->execute();
    }

    


    ?>
</body>

</html>