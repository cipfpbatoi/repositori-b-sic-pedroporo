<?php
session_start();
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
    $remember = $_POST['remember'] ?? false;
    if (isset($users[$email]) && password_verify($password, $users[$email]) && !isset($_COOKIE['user']) && $remember) {
        setcookie("user", $email/*, time() + (86400 * 30), "/"*/);
        //$_COOKIE['user'] = $email;
        $_SESSION['user'] = $email;
        echo "Login successful. Welcome, " . $email . "<br>";
    } else if (isset($users[$email]) && password_verify($password, $users[$email])) {

        $_SESSION['user'] = $email;
        echo "Login successful. Welcome, " . $email . "<br>";
    } else {
        // Credencials incorrectes
        echo "Invalid email or password.";
    }
}
$userLogged = $_COOKIE['user'] ?? $_SESSION['user'] ?? null;
/*echo "cookie";
var_dump($_COOKIE['user'] ?? "None");
echo "session";
var_dump($_SESSION['user'] ?? "None");*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <?php
    if (isset($userLogged)) {
        echo "Bienvenido " . $userLogged . " <a href='./logout.php'>Cerrar Sesion</a> <br>";
    } else {
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Introduce tu email:</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="password">Introduce tu contraseña:</label><br>
            <input type="password" name="password" id="password"><br>
            <label for="remember">Recordarte?: </label>
            <input type="checkbox" name="remember" id="remember" value="true">
            <input type="submit" name="login" value="Enviar">
        </form>
    <?php } ?>
    <br>
</body>

</html>