<?php

require_once "../vendor/autoload.php";
require_once "../app/Config/parametros.php";
use App\Controller\ApiController;
use App\Core\Router;
use App\Models\DBAbstractModel;

$router=new Router();
$router->add(array(
    "name"=>"home",
    "path"=>'/^\/list$/',
    "action"=>[ApiController::class, "index"]
),
array(
    "name"=>"home",
    "path"=>'/^\/saludos\/antonio2$/',
    "action"=>[IndexController::class, "IndexAction"]
),
array(
    "name"=>"home",
    "path"=>'/^\/add$/',
    "action"=>[IndexController::class, "IndexAction"]
),
array
(
    "name"=>"home",
    "path"=>'/^\/delete$/',
    "action"=>[IndexController::class, "IndexAction"]
),
array
(
    "name"=>"home",
    "path"=>'/^\/update$/',
    "action"=>[IndexController::class, "IndexAction"]
),
array
(
    "name"=>"home",
    "path"=>'/^\/list$/',
    "action"=>[IndexController::class, "IndexAction"]
),
array(
    "name"=>"home",
    "path"=>'/^\/api\/contactos$/',
    "action"=>[ApiController::class, "getContactos"]

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