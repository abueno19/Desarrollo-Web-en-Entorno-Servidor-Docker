<?php


namespace App\Controller;

class IndexController extends BaseControllers{
    
    public function IndexAction($message="hola mundo"){
        $data=array("message"=>$message);
        $this->renderHTML("../views/index.php",$data);
    }

}