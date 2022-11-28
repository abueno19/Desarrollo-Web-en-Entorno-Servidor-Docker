<?php
// Vamos a crear una funcion para que nos devuelva la conexion a la base de datos
//
// 1. Crear una funcion que se llame conectar()
/*
    * @param $host
    * @param $user
    * @param $password
    * @param $database
    * @return $conexion
*/

function conexion($host, $user, $password, $database) {
    // 2. Crear una variable que se llame $conexion y que sea igual a mysqli_connect()
    //    con los parametros de la conexion a la base de datos con pdo
    try{
        $conexion = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // cambiar codificacion a utf8
        $conexion->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");

        // 3. Devolver la variable $conexion
        return $conexion;
    }catch(Exception $e){
        echo "Error al conectar con la base de datos: "+$e;
    }
    return $conexion;
}

function addEquipo($conexion, $data) {
    // Vamos a añadir un equipo a la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para insertar un equipo
    $consulta = $conexion->prepare("INSERT INTO equipos (nombre_equipo, descripcion) VALUES (:nombre_equipo, :descripcion)");
    $consulta->bindParam(':nombre_equipo', $data['nombre_equipo']);
    $consulta->bindParam(':descripcion', $data['descripcion']);
    // 2. Devolver la variable $consulta
    return $consulta->execute();
}
function getEquiposById($conexion, $id=false) {
    // Vamos a buscar un equipo en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para buscar un equipo
    if($id){
        $consulta = $conexion->prepare("SELECT * from equipos where id like :search");
        $consulta->bindParam(':search', $id);
    }else{
        $consulta = $conexion->prepare("SELECT * FROM equipos LIMIT 10");
    }
    $consulta->execute();
    // 2. Devolver la variable $consulta
    return $consulta->fetchAll()[0];
}
function getEquipos($conexion) {
    // Vamos a buscar los equipos en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para buscar los equipos
    $consulta = $conexion->prepare("SELECT * FROM equipos");
    $consulta->execute();
    
    return $consulta->fetchAll();
    

}
    

function updateEquipo($conexion,$data) {
    // Vamos a actualizar un equipo en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para actualizar un equipo
    
    $consulta = $conexion->prepare("UPDATE equipos SET nombre_equipo=:nombre_equipo, descripcion=:descripcion WHERE id=:id");
    $consulta->bindParam(':nombre_equipo', $data['nombre_equipo']);
    $consulta->bindParam(':descripcion', $data['descripcion']);
    $consulta->bindParam(':id', $data['id']);
    // 2. Devolver la variable $consulta
    return $consulta->execute();
}
function deleteEquipo($conexion, $id) {
    // Vamos a borrar un equipo en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para borrar un equipo
    $consulta = $conexion->prepare("DELETE FROM equipos WHERE id=:id");
    $consulta->bindParam(':id', $id);
    // 2. Devolver la variable $consulta
    return $consulta->execute();
}
function login($conexion, $data) {
    // Vamos a buscar un usuario en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para buscar un usuario
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE user=:nombre_usuario AND password=:password");
    $consulta->bindParam(':nombre_usuario', $data['user']);
    $consulta->bindParam(':password', $data['password']);
    $consulta->execute();
    // 2. Devolver la variable $consulta
    return $consulta->fetchAll();
}
?>