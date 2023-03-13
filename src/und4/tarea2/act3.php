<?php
// Llamada a una clase que cada vez que se llama a la clase se incrementa un contador
class Contador{
    private static $contador = 0;
    public function __construct(){
        self::$contador++;
    }
    // Funcion que incrementa el contador
    public static function incrementar(){
        self::$contador++;
    }

    public static function getContador(){
        return self::$contador;
    }
}
// Llamada a la clase
echo("Creando contador1");
echo("<br>");
$contador1 = new Contador();
$contado1::incrementar();
echo("El contador vale: ".Contador::getContador());
echo("Creando contador2");
echo("<br>");
$contador2 = new Contador();
echo("Creando contador3");
echo("<br>");
$contador3 = new Contador();
echo("Creando contador4");
echo("<br>");
$contador4 = new Contador();
echo("Creando contador5");
echo("<br>");
$contador5 = new Contador();
echo("Creando contador6");
echo("<br>");
$contador6 = new Contador();
echo Contador::getContador();
echo ("<a href='https://github.com/abueno19/Und3_tarea1_DWES/blob/main/src/und4/tarea2/act3.php'>Github</a>");




?>