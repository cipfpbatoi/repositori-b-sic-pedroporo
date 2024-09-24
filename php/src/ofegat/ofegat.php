<!DOCTYPE html>
<html>
    <head>
        <title>Ofegat</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
    <?php
    include_once "funciones.php";
    
    $secreta=$_POST['secreta'] ?? getWord();
    $correctas=json_decode(htmlspecialchars_decode($_POST['correctas']?? ""))??[""];
    $incorrectas=json_decode(htmlspecialchars_decode($_POST['incorrectas']??""))??[""];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        comprobarLetra($_POST['palabra']??"",$secreta,$correctas,$incorrectas);
       
    }
    
    //echo "$secreta <br>";
    createArraySecreta($secreta,$correctas);
    
    ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="palabra">Introduce una letra:</label><br>
        <input type="text" name="palabra" id="palabra" maxlength="1"><br>
        <input type="hidden" name="secreta" value="<?= $secreta?>">
        <input type="hidden" name="correctas" value="<?= htmlspecialchars(json_encode($correctas)) ?>">
        <input type="hidden" name="incorrectas" value="<?= htmlspecialchars(json_encode($incorrectas)) ?>">
        <input type="submit" value="Enviar">
        </form>
        <br>
        <?php
        foreach ($incorrectas as $valor => $letra) {
            echo "<a class='incorrect'>$letra </a>";
        }
        ?>
    </body>
</html>

