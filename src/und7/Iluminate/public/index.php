<?php
require_once "../vendor/autoload.php";
require_once "../app/Config/parametros.php";
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use App\Controller\IndexController;
use App\Controllers\ApiController;

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => DBHOST,
    'database' => DBNAME,
    'username' => DBUSER,
    'password' => DBPASS,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
$users = Capsule::table('contactos')->get();
print_r($users);
$map->get('index', '/', function ($request, $response) {
    $controller = new ApiController($request);
    return $controller->index();
});


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);




?>