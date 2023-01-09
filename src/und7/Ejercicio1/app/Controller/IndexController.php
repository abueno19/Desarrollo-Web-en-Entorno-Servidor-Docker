<?php


namespace App\Controller;

class IndexController extends BaseControllers{
    public function IndexAction(){
        $data=array("message"=>"hola mundo");
        $this->renderHTML("../views/index.php",$data);
    }

}