<!DOCTYPE html>
<html>

<head>
    <title>4 En raya</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    include_once "funciones.php";
    $pantalla = json_decode(htmlspecialchars_decode($_POST['pantalla'] ?? ""),true) ?? iniciarArray();
    $jugador = $_POST['jugador']??"f";
    $columna = $_POST['columna']??null;
    if ($_SERVER["REQUEST_METHOD"] == "POST"&&$jugador!="f") {
        //var_dump($columna,$jugador);
        hacerMovimiento($pantalla,$columna,$jugador);
    }
    elegirJugador($jugador);
    ?>
    <h1>Jugador actual <?= ($jugador == "player1") ? "Jugador 1" : "Jugador 2" ?></h1>
    <h1>Columna: <?= $columna ?></h1>
    <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            pintarJuego($pantalla);
            ?>

            <input type="hidden" name="jugador" value="<?= $jugador ?>">
            <input type="hidden" name="pantalla" value="<?= htmlspecialchars(json_encode($pantalla)) ?>">
        </form>

    </table>
</body>

</html>