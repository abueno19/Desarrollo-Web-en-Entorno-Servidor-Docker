<?php

class Mascota{
    public static function getNombre(){
        echo ("Soy una mascota");
    }
    public static function whoami(){
        self::getNombre();

    }
}
class Perro extends Mascota{
    public static function getNombre(){
        echo ("Soy un perro");
    }
}
Perro::whoami();





?>