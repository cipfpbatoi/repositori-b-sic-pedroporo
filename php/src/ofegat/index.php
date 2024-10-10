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
    unset($_SESSION['secreta']);
    unset($_SESSION['correctas']);
    unset($_SESSION['incorrectas']);
    unset($_SESSION['intentos']);
    header("Location: ./");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ofegat</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    include_once "funciones.php";

    $secreta = $_SESSION['secreta'] ?? getWord();
    $correctas = $_SESSION['correctas'] ?? [];
    $incorrectas = $_SESSION['incorrectas'] ?? [];
    $intentos = $_SESSION['intentos'] ?? 7;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        comprobarLetra($_POST['palabra'] ?? "", $secreta, $correctas, $incorrectas, $intentos);
        if (comprobarVictoria($secreta, $correctas)) {
            echo "<h1 class='correct'>Has ganado</h1><br>";
            echo "<a href='?reiniciarJuego'><button>Reiniciar Juego </button> </a><br>
    <a href='?cerrarSesion'><button>Cerrar Sesion </button> </a>";
            return;
        }
    }
    if ($intentos === 0) {
        echo "<h1 class='incorrect'>Has perdido</h1><br>";
        echo "<a href='?reiniciarJuego'><button>Reiniciar Juego </button> </a><br>
    <a href='?cerrarSesion'><button>Cerrar Sesion </button> </a>";
        return;
    } else {
        echo "Te quedan: " . $intentos . " intentos<br>";
    }
    //echo "$secreta <br>";
    createArraySecreta($secreta, $correctas);
    $_SESSION['secreta'] = $secreta;
    $_SESSION['correctas'] = $correctas;
    $_SESSION['incorrectas'] = $incorrectas;
    $_SESSION['intentos'] = $intentos
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="palabra">Introduce una letra:</label><br>
        <input type="text" name="palabra" id="palabra" maxlength="1" required><br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <?php
    foreach ($incorrectas as $valor => $letra) {
        echo "<a class='incorrect'>$letra </a>";
    }
    ?>
    <br>
    <a href='?reiniciarJuego'><button>Reiniciar Juego </button> </a><br>
    <a href='?cerrarSesion'><button>Cerrar Sesion </button> </a>
</body>

</html>