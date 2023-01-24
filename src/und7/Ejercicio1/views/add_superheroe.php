<?php


require_once "../vendor/autoload.php";
require_once "../app/Config/parametros.php";
use App\Models\Superheroe;

class addcslashes{
    public function add_superheroe(){
        $superheroe=new Superheroe();
        $superheroe->setNombre($_POST["nombre"]);
        $superheroe->setPoder($_POST["poder"]);
        $superheroe->setVillano($_POST["villano"]);
        $superheroe->setUniverso($_POST["universo"]);
        $superheroe->setImagen($_POST["imagen"]);
        $superheroe->setDescripcion($_POST["descripcion"]);
        $superheroe->setFecha($_POST["fecha"]);
        $superheroe->setPuntuacion($_POST["puntuacion"]);
        $superheroe->setActivo($_POST["activo"]);
        $superheroe->setCreado(date("Y-m-d H:i:s"));
        $superheroe->setModificado(date("Y-m-d H:i:s"));
        $superheroe->save();
        header("Location: ".DIRBASEURL."/list");
    }
}