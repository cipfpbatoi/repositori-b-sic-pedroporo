<?php
session_start();
include_once "funciones.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Historial</title>
</head>

<body>
    <h1>Historial</h1>
    <?php
    if (isset($_SESSION['historial'])) {
        foreach ($_SESSION['historial'] as $pagina) {
            echo $pagina . "<br>";
        }
    } else {
        echo "No has visitado ninguna pagina aun";
    }
    ?>
</body>

</html>