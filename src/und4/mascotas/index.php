<?php
// require_once 'app/modelo/perro.php';
// require_once 'app/modelo/persona.php';
require_once 'vendor/autoload.php';
use App\modelo\Perro;
use App\modelo\Persona;
echo("dame la pata" . "<br>");  
$perro1 = new Perro("Firulais","Neg");
$perro1->entrenar();
$perro1->entrenar();
$perro1->entrenar();
$perro1->entrenar();
$perro1->entrenar();
$perro1->darPata();
$perro1->darPata();
$perro1->darPata();
$perro1->verDatos();

?>