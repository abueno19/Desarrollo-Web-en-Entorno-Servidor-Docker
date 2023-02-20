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
                $this->get();
                break;
            case 'POST':
                $this->post();
                break;
            case 'PUT':
                $this->put();
                break;
            case 'DELETE':
                $this->delete( $this->request->getGet('id'));
                break;
        }
    }
    public function get($id = '') {
        if ($id == '') {
            #Vamos a devolver todos los contactos.
            $this->contactos->getAll();
            $this->renderHTML('../view/contactos.php', [
                'contactos' => $this->contactos->rows
            ]);
        }else{
            #Vamos a devolver un contacto por id.
            $this->contactos->get($id);
            $this->renderHTML('../view/contactos.phpp', [
                'contacto' => $this->contactos->rows[0]
            ]);
        }
    }
    public function post() {
        $this->parametros['nombre'] = $this->request->getPost('nombre');
        $this->parametros['telefono'] = $this->request->getPost('telefono');
        $this->parametros['email'] = $this->request->getPost('email');
        $this->contactos->set($this->parametros);
        $this->renderHTML('../view/contactos.php', [
            'contacto' => $this->contactos->rows[0]
        ]);
    }
    public function put() {
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
        $this->contactos->delete($id);
        $this->renderHTML('../view/contactos.php', [
            'contacto' => $this->contactos->rows[0]
        ]);
    }


}
