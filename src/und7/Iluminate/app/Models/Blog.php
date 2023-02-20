<?php
namespace App\Models;
require_once('DBAbstractModel.php');

class Blog extends DBAbstractModel{
    # Blog
    private $titulo;
    private $contenido;
    private $autor;
    private $fecha;
    private $imagen;
    private $tags;
    # DB
    private $id;
    private $created_at;
    private $updated_at;
    private $db_name;
    private 
    function __construct() {
        $this->db_name = 'blog';
    }
    public function get(){
        $this->query = "SELECT * FROM blog";
        $this->get_results_from_query();
        return $this->rows;
    }
    public function set(){
        # Vamos a añadir la entrada de todo el blog en nuestra base de daatos 
        # EN caso de que no este creada la tabla la creamos
        $this->query = "CREATE TABLE IF NOT EXISTS blog (
            id INT(11) NOT NULL AUTO_INCREMENT,
            titulo VARCHAR(255) NOT NULL,
            contenido TEXT NOT NULL,
            autor VARCHAR(255) NOT NULL,
            fecha DATE NOT NULL,
            imagen VARCHAR(255) NOT NULL,
            tags VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->execute_single_query();
        $this->query = "INSERT INTO blog (titulo, contenido, autor, fecha, imagen, tags) VALUES ('$this->titulo', '$this->contenido', '$this->autor', '$this->fecha', '$this->imagen', '$this->tags')";
        $this->execute_single_query();
        $this->mensaje = 'Entrada añadida';
    }
    public function edit($user_data=array()){
        foreach ($user_data as $campo=>$valor){
            $$campo = $valor;
        }
        $this->query = "UPDATE blog SET titulo='$titulo', contenido='$contenido' WHERE id='$id'";
        $this->execute_single_query();
        $this->mensaje = 'Entrada modificada';
    }
    public function delete($id=''){
        $this->query = "DELETE FROM blog WHERE id = '$id'";
        $this->execute_single_query();
        $this->mensaje = 'Entrada eliminada';
    }

    public function setTitle($title){
        $this->titulo = $title;
    }
    public function setBlog($blog){
        $this->contenido = $blog;
    }
    public function setImage($image){
        $this->imagen = $image;
    }
    public function setAuthor($author){
        $this->autor = $author;
    }
    public function setTags($tags){
        $this->tags = $tags;
    }
    public function setCreated($created_at){
        $this->created_at = $created_at;
    }
    public function getCreated(){
        return $this->created_at;
    }


    public function setUpdated($updated_at){
        $this->updated_at = $updated_at;
    }



}