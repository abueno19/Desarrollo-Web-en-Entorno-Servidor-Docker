<?php
namespace App\Controller;
class BaseControllers{
    public function renderHTML($filename,$data=[]){
        include($filename);
    }
}