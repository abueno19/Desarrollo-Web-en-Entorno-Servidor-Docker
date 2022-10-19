<?php
$post=$_POST;
if(isset($post["enviar"])){
    if(isset($_COOKIE["usuario"])&& isset($_COOKIE["contrasena"]) && isset($_COOKIE["caja"])){
        ;
        echo "La cookie se ha creado";
        echo "<br>";
        echo "El valor de la cookie es: ".$_COOKIE["usuario"];
        echo "<br>";
        echo "El valor de la cookie es: ".$_COOKIE["contrasena"];
        echo "<br>";
    }else{
        if ($post["usuario"] == "admin" && $post["contrasena"] == "admin" && $post["caja"] == "on"){
            setcookie("usuario", $post["usuario"], time()+3600);
            setcookie("contrasena", $post["contrasena"], time()+3600);

            echo "La cookie se ha creado";
            echo "<br>";
            echo "El valor de la cookie es: ".$_COOKIE["usuario"];
            echo "<br>";
            echo "El valor de la cookie es: ".$_COOKIE["contrasena"];
            echo "<br>";
        

            
    }
    else{
        echo "La autentificación ha fallado";
    }
}


}else{
    //borar las cooking
    setcookie("usuario", "", time()-3600);
    setcookie("contrasena", "", time()-3600);
    setcookie("caja", "", time()-3600);
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
        <?php
        if(!isset($post["enviar"])){
            echo("<form method='post'>");
            echo("<input type='text' name='usuario' placeholder='usuario'>");
            echo("<br>");
            echo("<input type='password' name='contrasena' placeholder='contrasena'>");   
            echo("<br>");
            echo("<input type='checkbox' name='caja' checked/>");
            echo("<br>");
            echo("<input type='submit' name='enviar' value='Enviar'>");
            echo("</form>");
        }   

        
        ?>
        <!-- <form method="post">
            <input type="submit" name="enviar" value="Enviar">
        </form> -->
            

    
    </body>
</html>