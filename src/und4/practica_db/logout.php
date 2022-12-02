<?php
// Vamos a cerrar sesion
if (session_status() == PHP_SESSION_NONE) {
    if (isset($_SESSION['user'])) {
        session_destroy();
    }
}
header("Location: index.php");
?>
