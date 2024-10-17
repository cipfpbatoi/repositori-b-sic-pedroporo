<?php
include_once("./../helpers/autoload.php");

use \Empresa;
use ej3\Empleado;

$empl = new Empleado("Puto", "Salmon sd");
$empl->anyadirTelefono(342342);
$empl->anyadirTelefono(75756);
$empl->anyadirTelefono(34254353342);
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Herència i Polimorfisme</title>
</head>

<body>
    <p><?php echo $empl->toHtml($empl) ?></p>
</body>

</html>