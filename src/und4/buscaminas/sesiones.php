<?php
// Vamos a crear _SESSIONes si no existe
// Creamos las _SESSIONes
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST["reiniciar"])){
    // Vamos a reiniciar el juego
    // Borramos las _SESSIONes
    session_destroy();
    // Creamos las _SESSIONes
    if(!isset($_SESSION)){
        session_start();
    }

}
?>