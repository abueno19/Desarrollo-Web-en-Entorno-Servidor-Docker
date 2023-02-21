<?php
namespace App\Controllers;

use App\Models\Contactos;
class ApiController extends BaseController
{    
    private $id;
    private $nombre;
    private $created_at;
    private $updated_at;
    private $telefono;
    private $email;
    private static $instancia;
    private  $request;
    private $contactos;
    private $query;
    private $parametros;
    private $metodo;
    private $rows;
    public function __construct($metodo, $request) {
        $this->contactos = Contactos::getInstancia();
        $this->request = $request;
        $this->metodo = $metodo;
        
        
    }
    # Vamos a comprobar que tipo de petición es con un switch.
    # Para cada funcion vamos a poner diferentes metodos. 
    # Get: Va a recoger una id que se le pasará por la url en caso de que no este vamos a devolver todos los contactos.
    # Post: Va a insertar un contacto en la base de datos va a recibir los datos por el metodo post.
    # Put: Va a actualizar un contacto en la base de datos por id que se le pasará por el metodo put.
    # Delete: Va a eliminar un contacto en la base de datos por id que se le pasará por el metodo delete.
    public function index() {
        
        switch ($this->metodo) {
            case 'GET':
                // echo("hola");
                $this->get($_GET['id']);
                break;
            case 'POST':
                $this->post($_GET);
                break;
            case 'PUT':
                $this->put();
                break;
            case 'DELETE':
                $this->delete(  $_GET['id']);
                break;
        }
    }
    public function get($id = '') {
        if ($id == '') {
            #Vamos a devolver todos los contactos.
            

            $data=array("message"=>$this->contactos->getAll());
            if (count($data['message'])==0) {
                $data['message']="No hay contactos";
            }
            
            $this->renderHTML('../view/contactos.php', $data
            );
        }else{
            #Vamos a devolver un contacto por id.
            
            $this->renderHTML('../view/contactos.php', [
                'message' => $this->contactos->get($_GET['id'])
            ]);
        }
    }
    public function post($parametros="") {
        // $data = (array) json_decode(file_get_contents('php://input'), true);
        
        // print_r();
        // echo("hola");
        // echo($parametros['nombre']);
        $this->parametros=$parametros;
        if (!isset($this->parametros['nombre']) || !isset($this->parametros['telefono']) || !isset($this->parametros['email'])) {
            $data = (array) json_decode(file_get_contents('php://input'), true);
            echo("no hay parametros");
            print_r($data);
            $this->parametros=$data;
        }
            
        
        $this->contactos->set($this->parametros);
        $this->renderHTML('../view/contactos.php', [
            'message' => "Se ha creado el contacto de manera adecuada"
        ]);
    }
    public function put() {
        $this->parametros=$_POST;
        $this->parametros['id'] = $this->request->getPost('id');
        $this->parametros['nombre'] = $this->request->getPost('nombre');
        $this->parametros['telefono'] = $this->request->getPost('telefono');
        $this->parametros['email'] = $this->request->getPost('email');
        $this->contactos->edit($this->parametros);
        $this->renderHTML('../view/contactos.php', [
            'contacto' => $this->contactos->rows[0]
        ]); 
    }
    public function delete($id) {
        
        $delete=$this->contactos->delete($id);
        if (!$delete) {
            $this->renderHTML('../view/contactos.php', [
                'message' => "No se ha podido eliminar el contacto con id: $id"
            ]);
            return;
        }
        $this->renderHTML('../view/contactos.php', [
            'message' => "Se ha eliminado el contacto con id: $id"
        ]);
    }


}
