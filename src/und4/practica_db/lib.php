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


?>