<?php
if($_POST){
    $numero=0;
    foreach($_POST as $key => $value){
        echo($key." : ".$value."<br>");
        $numero+=$value;
    }
    echo $numero;
}
?>