<?php
spl_autoload_register(function ($nombreClase) {
    $ruta = "tema4\\" . $nombreClase . '.php';
    $ruta = str_replace("\\", "/", $ruta);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $ruta;
});
