<?php

include 'lib.php';
include 'config.php';

?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Antonio Julian Bueno Fuentes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if(!isset($_SESSION["login"])&& !isset($_POST)){
            include 'sesion/iniciar_sesion.html';
        }
        else if ($_POST["login"] == "login" && $_POST["password"] == "usuario" && $_POST["usuario"] == "usuario") {
            $_SESSION["login"] = "login";
            $_SESSION["password"] = "password";
            $_SESSION["usuario"] = "usuario";
            echo("Bienvenido");
        } else if (isset($_SESSION["login"]) && $_SESSION["login"] == "login" && $_SESSION["password"] == "password" && $_SESSION["usuario"] == "usuario") {
            include 'compra/equipos.php';
            
        } else {
            print_r($_POST);
            
            include 'sesion/iniciar_sesion.html';
        }

        



        ?>
    </body>
</html>