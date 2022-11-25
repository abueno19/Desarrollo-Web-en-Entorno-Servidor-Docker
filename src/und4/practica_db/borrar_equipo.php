<?php
include 'lib/lib.php';
include 'config/config.php';
// vamos a borrar el equipo por la id que nos llega por GET
$conexion=conexion(HOST, USER, PASSWORD, DATABASE);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $borrar_equipo = delete_equipo($conexion, $id);
    if ($borrar_equipo) {
        header("Location: index.php");
    } else {
        echo "Error al borrar el equipo";
    }
}
    

?>