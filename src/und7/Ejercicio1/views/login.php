<?php
// Vamos a ver si hay una sesión iniciada
if (isset($_SESSION)){
    session_start();

}
if ($_SESSION['user']) {
    // Si hay sesión iniciada, vamos a ver si es un usuario o un administrador
    if ($_SESSION['user']['rol'] == 'admin') {
        // Si es un administrador, vamos a mostrar el menú de administrador
        include 'menu_admin.php';
    } 
} else {
    // Si no hay sesión iniciada, vamos a mostrar el menú de invitado
    include 'menu_invitado.php';
}