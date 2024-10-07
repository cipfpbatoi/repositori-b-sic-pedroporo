<?php
session_start();

$token = $_SESSION['token']??md5(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;
if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['token'] !== $_SESSION['token']) {
    /*header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;*/
    echo "Token no valido";
} else if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['token'] === $_SESSION['token']) {
    echo "Todo correcto";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Introduce un nombre:</label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="email">Introduce tu email:</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="mensaje">Introduce tu mensaje:</label><br>
        <input type="text" name="mensaje" id="mensaje"><br>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
        <input type="submit" value="Enviar">
    </form>
    <br>
</body>

</html>