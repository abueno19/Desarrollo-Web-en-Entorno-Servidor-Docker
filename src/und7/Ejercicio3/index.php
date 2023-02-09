<?php
// Vamos a crear un metodo de api rest que nos devuelva un json con los datos de un usuario
// Para ello vamos a crear un array con los datos del usuario
// Aqui ira el 
// Ahora vamos a convertir el array en un json
$json = json_encode($usuario);
// Y por ultimo vamos a devolver el json

// Vamos a cambiar los header para que sea una api rest
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Access-Control-Max-Age: 3600');

// Vamos a comprobar que el metodo de la peticion sea get

// Vamos a a esperar a que usen el metodo get de la api rest´

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // Si el metodo es get vamos a devolver el json
    echo $json;
}





?>