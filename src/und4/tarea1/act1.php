<?php
//Crea una cookie
setcookie("nombre", "valor", time()+3600);
//comprobar el estado de la
// cookie y destruirla.
if(isset($_COOKIE["nombre"])){
    echo "La cookie se ha creado";
    echo "<br>";
    echo "El valor de la cookie es: ".$_COOKIE["nombre"];
    echo "<br>";
    echo "La cookie se ha destruido";
    setcookie("nombre", "", time()-3600);
}else{
    echo "La cookie no existe";
}




?>