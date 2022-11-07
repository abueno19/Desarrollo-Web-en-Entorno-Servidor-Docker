<?php
// Llamada a una clase que cada vez que se llama a la clase se incrementa un contador
class Contador{
    private static $contador = 0;
    public function __construct(){
        self::$contador++;
    }
    public static function getContador(){
        return self::$contador;
    }
}
// Llamada a la clase
$contador1 = new Contador();
$contador2 = new Contador();
$contador3 = new Contador();
$contador4 = new Contador();
$contador5 = new Contador();
$contador6 = new Contador();
echo Contador::getContador();





?>