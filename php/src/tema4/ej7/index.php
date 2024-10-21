<?php
include_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\EmpleadoController;
use App\Controllers\EmpresaController;

$econtroller = new EmpresaController();
$econtroller->listAll();
$controller = new EmpleadoController();
$controller->listAll();

if (isset($_GET['viewEmpleados'])) {
    delProducto($carrito, $_GET['viewEmpleados']);
}