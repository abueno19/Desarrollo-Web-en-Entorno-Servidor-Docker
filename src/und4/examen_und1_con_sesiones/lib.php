<?php
if(!isset($_SESSION)){
    session_start();
}
function comprar(){
    if(isset($_POST['comprar'])){
        $salida=0;
        $_SESSION['comprar'];
        for ($i=0; $i < count($_SESSION['comprar']); $i++) { 
            if($_SESSION['comprar'][$i]['equipo']==$_POST['equipo']){
                $salida+=$_SESSION['comprar'][$i];
            }
        }
        // Vamos a romper la sesion

        session_destroy();
        return $salida;
    }
}
function generarAbonos($number){
    $abonos=array();
    for ($i=0; $i < $number; $i++) { 
        $abonos[$i]=rand(1,100);
    }
    return $abonos;

}

?>