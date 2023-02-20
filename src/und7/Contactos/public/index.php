<?php

require_once "../vendor/autoload.php";
require_once "../app/Config/parametros.php";
use App\Controllers\ApiController;
use App\Core\Router;


$router=new Router();
$router->add(array(
    "name"=>"home",
    "path"=>'/^\/api\/contactos$/',
    "action"=>[ApiController::class, "index"]

)

);
$request=str_replace(DIRBASEURL,"",$_SERVER["REQUEST_URI"]);
$router=$router->match($request);


if($router){
    
    
    $controllerName=$router["action"][0];
    $actionName=$router["action"][1];
    $controller=new $controllerName($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
    
    $controller->$actionName($request);
}else{
    echo("no route");
    echo("<br>");
    echo($_SERVER['REQUEST_URI']);
}