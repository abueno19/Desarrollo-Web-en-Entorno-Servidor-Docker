<?php
// Vamos a crear una funcion para que nos devuelva la conexion a la base de datos
//
// 1. Crear una funcion que se llame conectar()
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
function add_equipo($conexion, $nombre_equipo, $descripcion) {
    // Vamos a añadir un equipo a la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para insertar un equipo
    $consulta = $conexion->prepare("INSERT INTO equipos (nombre_equipo, descripcion) VALUES (:nombre_equipo, :descripcion)");
    $consulta->bindParam(':nombre_equipo', $nombre_equipo);
    $consulta->bindParam(':descripcion', $descripcion);
    // 2. Devolver la variable $consulta
    return $consulta->execute();
}
function search_equipo($conexion, $id) {
    // Vamos a buscar un equipo en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para buscar un equipo
    if($id != ""){
        
        $consulta = $conexion->prepare("SELECT * from equipos where id like :search");
        $consulta->bindParam(':search', $id);
    }else{
        $consulta = $conexion->prepare("SELECT * FROM equipos LIMIT 10");
    }
    $consulta->execute();
    // 2. Devolver la variable $consulta
    return $consulta->fetchAll()[0];
}
function get_equipos($conexion, $limit = 10) {
    // Vamos a buscar los equipos en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para buscar los equipos
    $consulta = $conexion->prepare("SELECT * FROM equipos");
    $consulta->execute();
    
    return $consulta->fetchAll();
    

}
    

function update_equipo($conexion, $id, $nombre_equipo, $descripcion) {
    // Vamos a actualizar un equipo en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para actualizar un equipo
    $consulta = $conexion->prepare("UPDATE equipos SET nombre_equipo=:nombre_equipo, descripcion=:descripcion WHERE id=:id");
    $consulta->bindParam(':nombre_equipo', $nombre_equipo);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':id', $id);
    // 2. Devolver la variable $consulta
    return $consulta->execute();
}
function delete_equipo($conexion, $id) {
    // Vamos a borrar un equipo en la base de datos
    // 1. Crear una variable que se llame $consulta y que sea igual a mysqli_query()
    //    con la consulta para borrar un equipo
    $consulta = $conexion->prepare("DELETE FROM equipos WHERE id=:id");
    $consulta->bindParam(':id', $id);
    // 2. Devolver la variable $consulta
    return $consulta->execute();
}

?>