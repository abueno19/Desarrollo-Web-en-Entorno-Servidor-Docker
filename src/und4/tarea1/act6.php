<?php
function clear_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$lista=[];
//valida todo el metodo post
$post=$_POST;
if (isset($post["submit"])){
    if (isset($post["nombre"]) && isset($post["email"]) && isset($post["url"]) && isset($post["comentario"])&& isset($post["genero"])){
        $nombre=clear_data($post["nombre"]);
        $email=clear_data($post["email"]);
        $url=clear_data($post["url"]);
        if (empty($nombre)){
            // añadir a la lista llamda lista
            array_push($lista, "El campo nombre no puede estar vacio");
        
            
   

        }
        if (empty($email)){
            array_push($lista, "El campo email no puede estar vacio");
            //comprueba si el email es valido
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($lista, "El campo email no es valido");
        }
        if (empty($url)){
            array_push($lista, "El campo url no puede estar vacio");
            // Comprueba si la URL tiene un formato válido
        }elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
            array_push($lista, "El campo url no es valido");
        }
        if (empty($post["genero"])){
            array_push($lista, "El campo genero no puede estar vacio");
        }

    }
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <!-- metodo post  -->
    <?php
    //mostrar la lista
    if (count($lista)>0){
        echo "<ul>";
        foreach ($lista as $value) {
            echo "<li>".$value."</li>";
        }
        echo "</ul>";
    }
    
    
    
    
    
    
    
    ?>
    <form method="post">

        <p>Nombre</p><input name="nombre"></input>

        <p>Email</p><input name="email"></input>
        <p>Url</p><input name="url"></input>
        <p>Comentario</p><textarea name="comentario"></textarea>
        <p>Genero</p>
        <input type="radio" id="hombre" name="genero" value="hombre">
        <label for="hombre">Hombre</label><br>
        <input type="radio" id="mujer" name="genero" value="mujer">
        <label for="mujer">Mujer</label><br>
        <input type="radio" id="otro" name="genero" value="otro">
        <label for="otro">Otro</label>
        <p>Seleciona una opcion</p>
        <select name="opcion">
            <option value="opcion1">Opcion 1</option>
            <option value="opcion2">Opcion 2</option>
            <option value="opcion3">Opcion 3</option>
        </select>
        <p>Selecciona un vehiculo</p>
        <input type="checkbox" id="coche" name="coche" value="coche">
        <label for="coche">Coche</label><br>
        <input type="checkbox" id="moto" name="moto" value="moto">
        <label for="moto">Moto</label><br>
        <input type="checkbox" id="bicicleta" name="bicicleta" value="bicicleta">
        <label for="bicicleta">Bicicleta</label>
        <!-- salto de linea -->
        <br>
        <input type="submit" value="Enviar">
    </form>2ªEvaluacón

</body>

</html>