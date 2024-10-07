<?php
session_start();
include_once "funciones.php";
addPage(getPage());
$users = [
    'user1@example.com' => 'password1',
    'user2@example.com' => 'password2',
    'pedro@test.com' => '1234',
];
foreach ($users as $email => $password) {
    $users[$email] = password_hash($password, PASSWORD_BCRYPT);
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($users[$email]) && password_verify($password, $users[$email])) {
        // L'usuari està autenticat

        $_SESSION['user'] = $email;
        echo "Login successful. Welcome, " . $email;
    } else {
        // Credencials incorrectes
        echo "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <?php
    if (isset($_SESSION['user'])) {
        echo "Bienvenido " . $_SESSION['user'] ." <a href='./logout.php'>Cerrar Sesion</a> <br>";
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="usuario">Introduce tu email:</label><br>
        <input type="text" name="email" id="email"><br>
        <label for="password">Introduce tu contraseña:</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" name="login" value="Enviar">
    </form>
    <br>
</body>

</html>