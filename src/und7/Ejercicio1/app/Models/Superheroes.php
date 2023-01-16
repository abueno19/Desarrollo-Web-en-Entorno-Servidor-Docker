<?php
namespace App\Models;

class Superheroes extends DBAbstractModel{
    // Vamos a crear las propiedades de superheroes : velocidad id nombre
    // Vamos a crear los geter h setters de las propiedades
    
    
    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;
    private static $instancia;
    // Vamos a crear los setter y getter de las propiedades
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function __construct() {
        // Vamos a usar el modelo singleton para la conexion a la base de datos
        $this->instancia = $this->singleton();
        


    }
    // Patron singleton
    public static function singleton(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }



        
}