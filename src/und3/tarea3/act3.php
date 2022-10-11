<?php
/**
 * 
 * @author Antonio Julian Bueno Fuentes
 */
 


if(!$_POST){
    $datos=array(
        "nombre","apellidos","edad");
    echo "<form method='post' >";
    foreach($datos as $dato){
           echo "<input type='text' name='".$dato."' />";
           
    }
    echo "<input type='submit' value='Enviar'/>";
    echo "</form>";
}else{
    print_r($_POST);
}





?>