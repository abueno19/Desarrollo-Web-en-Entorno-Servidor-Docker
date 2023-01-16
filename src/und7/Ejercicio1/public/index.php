<?php

require_once "../vendor/autoload.php";
require_once "../app/Config/parametros.php";
use App\Controller\IndexController;
use App\Core\Router;

$router=new Router();
$router->add(array(
    "name"=>"home",
    "path"=>'/^\/saludos\/antonio$/',
    "action"=>[IndexController::class, "IndexAction"]
),
array(
    "name"=>"home",
    "path"=>'/^\/saludos\/antonio2$/',
    "action"=>[IndexController::class, "IndexAction"]
)
);
$request=str_replace(DIRBASEURL,"",$_SERVER["REQUEST_URI"]);
$router=$router->match($request);

if($router){
    
    
    $controllerName=$router["action"][0];
    print_r($controllerName);
    echo("<br>");
    $actionName=$router["action"][1];
    echo($router["action"][2]);
    $controller=new $controllerName;
    echo("hola");
    $controller->$actionName($request);
}else{
    echo("no route");
    echo("<br>");
    echo($_SERVER['REQUEST_URI']);
}