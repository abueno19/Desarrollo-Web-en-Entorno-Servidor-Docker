<?php

namespace App\Models;

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Contactos extends DBAbstractModel {
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia(){
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone(){
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $created_at;
    private $updated_at;
    private $telefono;
    private $email;

    
    public function getMensaje(){
        return $this->mensaje;
    }

    public function set($date="") {

        $this->query = "INSERT INTO contactos(nombre, telefono, email)
                        VALUES(:nombre, :telefono, :email)";
        $this->parametros['nombre']= $date['nombre'];
        $this->parametros['telefono']=$date['telefono'];
        $this->parametros['email']=$date['email'];
        $this->get_results_from_query();
        $this->mensaje = 'Contacto agregado correctamente';
    }

    public function get($id=''){
        $this->query = "
            SELECT *
            FROM contactos
            WHERE id = :id";
        //Cargamos los parámetros.
        $this->parametros['id']= $id;

        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'contacto encontrado';
        }else {
            $this->mensaje = 'contacto no encontrado';
        }
        return $this->rows;
    }

    public function getAll(){
        
        $this->query = "SELECT * FROM contactos";
        
        //Cargamos los parámetros.
        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();
        foreach ($this->rows[0] as $propiedad=>$valor) {
            $this->$propiedad = $valor;
        }
        
        return $this->rows;
    }

    public function getAleatory(){
        $this->query = "SELECT *FROM superheroes ORDER BY RAND() LIMIT 5";
        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();
        
        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
        }else {
            $this->mensaje = 'sh no encontrado';
        }
        return $this->rows;
    }

    public function edit() {
        $this->query = "UPDATE contactos SET nombre= :nombre, telefono= :telefono, email= :email, updated_at=CURRENT_TIMESTAMP WHERE id= :id";
        if (!$this->id){
            $this->mensaje = 'No se puede actualizar un contacto sin id';
            return;
        }
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['telefono'] = $this->telefono;
        $this->parametros['email'] = $this->email;
        $this->parametros['id']= $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'Contacto editado correctamente';
    }

    public function delete(){
        $this->query = "DELETE FROM contactos WHERE id = :id";
        $this->parametros['id']=$this->id;
        $this->get_results_from_query();
        $this->mensaje = 'Contacto eliminado';
    }
}
