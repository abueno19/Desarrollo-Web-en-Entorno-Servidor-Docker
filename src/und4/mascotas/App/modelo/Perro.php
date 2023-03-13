<?php
namespace App\modelo;
class Perro{
    private $_nombre;
    private $_color;
    private $_habilidad;
    private $_sociabilidad;

    public function __construct($nombre,$color){
        $this->_nombre = $nombre;
        $this->_color = $color;
        $this->_habilidad = 5;
        $this->_sociabilidad = 0;

    }
    public function entrenar(){
        if ($this->_habilidad <= 10){
            $this->_habilidad++;
        }
    }
    public function darPata(){
        if ($this->_sociabilidad <= 10){
            $this->_sociabilidad++;
        }
    }
    // ver datos del perro
    public function verDatos(){
        echo("Nombre: " . $this->_nombre . "<br>");
        echo("Color: " . $this->_color . "<br>");
        echo("Habilidad: " . $this->_habilidad . "<br>");
        echo("Sociabilidad: " . $this->_sociabilidad . "<br>");
    }
    
}




?>