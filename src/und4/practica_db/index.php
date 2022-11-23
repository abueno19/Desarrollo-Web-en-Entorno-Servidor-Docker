<?php
include 'lib/lib.php';
include 'config/config.php';

$conexion = conexion(HOST, USER, PASSWORD, DATABASE);
// Vamos a crear las colunmas nombre_equipo

$conexion->exec("CREATE TABLE IF NOT EXISTS equipos(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre_equipo VARCHAR(30) NOT NULL UNIQUE,
    descripcion VARCHAR(30) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");

if (isset($_POST["add"])) {
    // Vamos a añadir los datos a la base de datos con consulta preparada
    $nombre_equipo = $_POST["nombre_equipo"];
    $descripcion = $_POST["descripcion"];
    // camprobamos que no hay inyeccion sql
    $consulta = $conexion->prepare("INSERT INTO equipos (nombre_equipo, descripcion) VALUES (:nombre_equipo, :descripcion)");
    $consulta->bindParam(':nombre_equipo', $nombre_equipo);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->execute();
    $consulta = $conexion->prepare("SELECT * FROM equipos LIMIT 10");

}
// Vamos a buscar los datos de la base de datos el post recibido va a ser con consulta preparada
if (isset($_POST["search"])) {
    if($_POST["search"] != ""){
        $search = $_POST["search"]."%";
        $consulta = $conexion->prepare("SELECT * from equipos where nombre_equipo like :search");
        $consulta->bindParam(':search', $search);
        

        
    }else{
        $consulta = $conexion->prepare("SELECT * FROM equipos LIMIT 10");

    }

}
if (!$consulta){
    $consulta = $conexion->prepare("SELECT * FROM equipos LIMIT 10");
}
$consulta->execute();





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

    // Vamos a crear un formulario para añadir equipos
    echo "<h2>ADD Equipo</h2>";
    echo "<form  method='POST'>";
    echo "<input type='text' name='nombre_equipo' placeholder='Nombre equipo'>";
    echo "<input type='text' name='descripcion' placeholder='Descripcion'>";
    echo "<input type='submit' name='add' value='add'>";
    echo "</form>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    // Vamos a buscar por equipo
    echo "<h2>Buscar Equipo</h2>";
    echo "<form  method='POST'>";
    echo "<input type='text' name='search' placeholder='Buscar Equipo'>";
    echo "<input type='submit'  value='search'>";
    echo "</form>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    

    echo "<table>";
    echo "<tr>";
    echo "<th>Nombre equipo</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Fecha creacion</th>";
    echo "<th>Modificar</th>";
    echo "<th>Borrar</th>";
    echo "</tr>";
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        // Vamos a mostrar los equipos en una tabla
        echo "<tr>";
        echo "<td>" . $fila["nombre_equipo"] . "</td>";
        echo "<td>" . $fila["descripcion"] . "</td>";
        echo "<td>" . $fila["fecha_creacion"] . "</td>";
        echo "<td><a href='modificar_equipo.php?id=" . $fila["id"] . "'>Modificar</a></td>";
        echo "<td><a href='borrar_equipo.php?id=" . $fila["id"] . "'>Borrar</a></td>";
    }
    echo "</tr>";
    echo "</table>";
    


    // Vamos a comprobar si se ha pulsado el boton añadir
    

    


    ?>
    <br>
    <br>
    <br>

    <a href="https://github.com/abueno19/Und3_tarea1_DWES/tree/main/src/und4/practica_db">Link a github</a>
</body>

</html>