<?php
$conn = require $_SERVER['DOCUMENT_ROOT'] . "/config/connection.php";

try {
    $dsn = 'mysql:host=' . $conn['host'] . ';dbname=' . $conn['dbname'];
    $usuari = $conn['username'];
    $contrasenya = $conn['password'];
    $pdo = new PDO($dsn, $usuari, $contrasenya);
    echo "Conexion establecida";
} catch (PDOException $e) {
    echo "Error de conexion: " . $e->getMessage();
    exit();
}
