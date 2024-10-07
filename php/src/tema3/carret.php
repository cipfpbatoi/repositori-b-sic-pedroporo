<?php
session_start();

$carrito = $_SESSION['carrito'] ?? [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingrediente = $_POST['producte'];
    $carrito[] = $ingrediente;
}



//var_dump($carrito);
if (isset($_GET['delProducto'])){
    delProducto($carrito,$_GET['delProducto']);
}

foreach (array_count_values($carrito) as $producto => $numero) {
    echo "$producto: $numero  <a href='?delProducto=$producto'>Eliminar x1</a> <br>";
}
function delProducto(&$carrito,$producto) {
    array_splice($carrito, array_search($producto, $carrito), 1);
}
$_SESSION['carrito'] = $carrito;