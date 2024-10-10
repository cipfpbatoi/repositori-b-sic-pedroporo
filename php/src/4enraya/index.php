<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_COOKIE['user'])) {
    header("Location: ../");
    exit();
}
if (isset($_GET['cerrarSesion'])) {
    header("Location: ../logout.php");
    exit();
}
if (isset($_GET['reiniciarJuego'])) {
    unset($_SESSION['pantalla']);
    unset($_SESSION['jugador']);
    header("Location: ./");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>4 En raya</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    include_once "funciones.php";
    $pantalla = $_SESSION['pantalla'] ?? iniciarArray();
    //$pantalla = json_decode(htmlspecialchars_decode($_POST['pantalla'] ?? ""), true) ?? iniciarArray();
    $jugador = $_SESSION['jugador'] ?? "f";
    $columna = $_POST['columna'] ?? null;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $jugador != "f") {
        //var_dump($columna,$jugador);
        hacerMovimiento($pantalla, $columna, $jugador);
        $jugadorActual = ($jugador == "player1") ?  $_COOKIE['user'] : "Jugador 2";
        switch (comprobarGanador($pantalla, $jugador,$columna)) {
            case 'player1';
            case 'player2':
                echo "<h1> Gana el jugador " . $jugadorActual . " </h1><br>";
                echo "<a href='?reiniciarJuego'><button>Reiniciar Juego </button> </a><br>
    <a href='?cerrarSesion'><button>Cerrar Sesion </button> </a>";
                return;
            case 'empate':
                echo "<h1>Esto es un empate</h1><br>";
                echo "<a href='?reiniciarJuego'><button>Reiniciar Juego </button> </a><br>
    <a href='?cerrarSesion'><button>Cerrar Sesion </button> </a>";
                return;
            default:
                break;
        }
    }
    elegirJugador($jugador);
    $_SESSION['pantalla'] = $pantalla;
    $_SESSION['jugador'] = $jugador;
    //var_dump($pantalla);
    /*$secreta = $_POST['secreta'] ?? getWord();
    $correctas = json_decode(htmlspecialchars_decode($_POST['correctas'] ?? "")) ?? [""];
    $incorrectas = json_decode(htmlspecialchars_decode($_POST['incorrectas'] ?? "")) ?? [""];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        comprobarLetra($_POST['palabra'] ?? "", $secreta, $correctas, $incorrectas);
    }

    //echo "$secreta <br>";
    createArraySecreta($secreta, $correctas);
*/

    ?>
    <h1>Jugador actual <?= ($jugador == "player1") ?  $_COOKIE['user'] : "Jugador 2" ?></h1>
    <h1>Columna: <?= $columna ?></h1>

    <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            pintarJuego($pantalla);
            /*
            <input type="hidden" name="jugador" value="<?= $jugador ?>">
            <input type="hidden" name="pantalla" value="<?= htmlspecialchars(json_encode($pantalla)) ?>">
             */
            ?>
        </form>
    </table>
    <a href='?reiniciarJuego'><button>Reiniciar Juego </button> </a><br>
    <a href='?cerrarSesion'><button>Cerrar Sesion </button> </a>
</body>

</html>