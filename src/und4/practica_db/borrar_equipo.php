<?php
include 'lib.php';
include 'config.php';
// vamos a borrar el equipo por la id que nos llega por GET
$conexion = conexion($host, $user, $password, $database);
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM equipos WHERE id = $id");
$equipo = $consulta->fetch(PDO::FETCH_ASSOC);

try{
    $conexion->exec("DELETE FROM equipos WHERE id=$id");
    echo("Se ha borrado el equipo correctamente");
}catch(PDOException $e){
    echo $e->getMessage();
}
// Redirigimos a la pagina de equipos
header("Location: index.php");
    

?>