<?php

use App\Controller\IndexController;
use App\Core\Router;

require_once "../vendor/autoload.php";
require "../app/Config/parametros.php";
$router=new Router();
$router->add(array(
    "name"=>"home",
    "path"=>'/^\/$/',
    "action"=>[IndexController::class, "IndexAction"]
));
$request=str_replace(DIRBASEURL,"",$_SERVER["REQUEST_URI"]);
$router=$router->match($request);

if($router){
    $controllerName=$route["action"][0];
    $actionName=$route["action"][1];
    $controller=new $controllerName;
    $controller->$actionName($request);
}else{
    echo("no route");
}