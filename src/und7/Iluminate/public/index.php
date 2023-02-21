<?php
require_once "../vendor/autoload.php";
require_once "../app/Config/parametros.php";

use App\Models\Illuminate;

$a= new Illuminate();
$a->open_db();
?>