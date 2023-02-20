<?php
namespace App\Models;
class User extends DBAbstractModel{
    private static $instancia;
    # Vamos a crear una instancia de la clase
    public static function getInstancia(){
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    # Vamosa  crear el login
    public function login($usuario, $password) {
        $this->query = "
                SELECT *
                FROM usuarios
                WHERE usuario = :usuario and
                      password = :password";
        //Cargamos los parámetros.
        $this->parametros['usuario'] = $usuario;
        $this->parametros['password'] = $password;

        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();

        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'contacto encontrado';
        } else {
            $this->mensaje = 'contacto no encontrado';
        }
        return $this->rows[0] ?? null;
    }
    public function get($id = '') {
    }
    public function set() {
    }
    public function edit() {
    }
    public function delete() {
    }

}