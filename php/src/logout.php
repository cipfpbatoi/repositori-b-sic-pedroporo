<?php
// Recuperamos la información de la sesión
session_start();
setcookie('user', "", 1);
// Y la destruimos
session_destroy();
header("Location: /");
?>