<!DOCTYPE html>
<html>
    <head>
        <title>Testing</title>
    </head>
    <body>

        <?php
            include_once "./helpers/funciones.php";
            $resultado = suma(5,3);
            echo "¡Hola, soy un script de PHP!";
            echo "<p>La fecha de hoy es:" . date('Y-m-d') . "</p>";
            
            echo $resultado;

        ?>
        <br>
        <img src="https://picsum.photos/200" alt="">
    </body>
</html>