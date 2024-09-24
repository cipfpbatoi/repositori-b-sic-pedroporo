<!DOCTYPE html>
<html>
    <head>
        <title>Ej 7</title>
    </head>
    <body>
        <?php
        function validar($user,$email,$pass1,$pass2,&$errores){

            if (!hasText($user)) {
                $errores["user"]="El usuario no deve estar vacio.";
            }
            if (hasText($email)) {
                if (!validarEmail($email)) {
                    $errores["email"]="Este email es incorrecto.";
                }
            }else{
                $errores["email"]="El email no deve estar vacio.";
            }
            if (hasText($pass1)) {
                if (hasText($pass2)) {
                    if ($pass1!=$pass2) {
                        $errores["pass2"]="Las contraseñas deben coincidir.";
                    }
                }else{
                    $errores["pass2"]="Deves poner la contraseña otra vez.";
                }
            }else{
                $errores["pass1"]="La contraseña es obligatoria.";
            }
            if (sizeof($errores)>0) {
                return false;
            }
            return true;
        }
        function hasText($variable){
            if (is_null($variable)) {
                return false;
            }
            return true;
        }
        function validarEmail(string $email){
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
            $user = $_POST['user'] ?? "";
            $email = $_POST['email'] ?? "";
            $pass1 =$_POST['pass1'] ?? "";
            $pass2 = $_POST['pass2'] ?? "";
            $errores=[];
            
        
            if ($_SERVER["REQUEST_METHOD"] == "POST"&&validar($user,$email,$pass1,$pass2,$errores)) {
                echo"<p>Todos los valores estan bien</p>";
               
            } else{

                
                ?>
                
                <h2>Formulario de usuario</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <label for="user">Nombre:</label>
                    <input type="text" id="user" name="user" value="<?= $user?>" required><?= $errores["user"] ?? ""?><br><br>
                    
                    <label for="email">Correo electronico:</label>
                    <input type="email" id="email" name="email" placeholder="email@email.com" value="<?= $email?>"required>
                    <?= $errores["email"] ?? ""?>
                    <br><br>
                    <label for="pass1">Introduzca su contraseña:</label>
                    <input type="password" name="pass1" id="pass1" value="<?= $pass1?>" required><?= $errores["pass1"] ?? ""?><br><br>
                    <label for="pass2">Repita su contraseña:</label>
                    <input type="password" name="pass2" id="pass2" value="<?= $pass2?>" required>
                    <?= $errores["pass2"] ?? ""?><br><br>
                    <input type="submit" value="Enviar">
                </form>
                <?php
                    }
                ?>
             
    </body>
</html>