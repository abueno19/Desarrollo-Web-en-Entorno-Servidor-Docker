<?php
namespace App\modelo;
class Persona{
    private $_nombre;
    private $_apellidos1;
    private $_apellidos2;

    public function __construct($nombre,$apellidos1,$apellidos2){
        $this->_nombre = $nombre;
        $this->_apellidos1 = $apellidos1;
        $this->_apellidos2 = $apellidos2;
    }
    public function __destruct(){
        echo $this->_nombre. " destruido";
    }
    public function getNombre(){
        return $this->_nombre;
    }





}





?>