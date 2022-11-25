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

// Vamos a añadir equipos a la base de datos

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $equipos = search_equipo($conexion, $search);
    
} else {
    $equipos = get_equipos($conexion,20);
    

    
}




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

    // Vamos a buscar por equipo
    echo "<h2>Buscar Equipo</h2>";
    echo "<form  method='POST'>";
    echo "<input type='text' name='search' placeholder='Buscar Equipo'>";
    echo "<input type='submit'  value='search'>";
    echo "</form>";
    // Vamos a crear un enlace con forma de boton para añadir un equipo
    echo "<a href='add.php'><button>Añadir Equipo</button></a>";
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
    foreach ($equipos as $equipo) {
        // Vamos a mostrar los equipos en una tabla
        echo "<tr>";
        echo "<td>" . $equipo["nombre_equipo"] . "</td>";
        echo "<td>" . $equipo["descripcion"] . "</td>";
        echo "<td>" . $equipo["fecha_creacion"] . "</td>";
        echo "<td><a href='modificar_equipo.php?id=" . $equipo["id"] . "'>Modificar</a></td>";
        echo "<td><a href='borrar_equipo.php?id=" . $equipo["id"] . "'>Borrar</a></td>";
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