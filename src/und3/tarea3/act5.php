<?php
if (isset($_POST['nombre']) && isset($_POST['apellidos']) && $_POST['nombre'] != "" && $_POST['apellidos'] != "") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    echo "Nombre: " . $nombre . "<br>";
    echo "Apellidos: " . $apellidos . "<br>";
    
}else{
    echo "<form method='post' >";
    echo("<input type='text' name='nombre' placeholder='Nombre'/>");
    if(isset($_POST['nombre'])){
        echo "No hay ningun nombre"."<br>";
    }
    echo("<input type='text' name='apellidos' placeholder='Apellidos'/>");
    if(isset($_POST['apellidos'])){
        echo "No hay ningun apellido"."<br>";
    }
    echo("<input type='submit' value='Enviar'/>");
}


?>