<?php
include_once("persona.php");
$pedro = new Persona("Pedro", "Guill Ferri");
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Persona</title>
</head>

<body>
    <p><?php echo $pedro->getNomComplet() ?></p>
</body>

</html>