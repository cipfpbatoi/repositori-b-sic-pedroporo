<!DOCTYPE html>
<html>
    <head>
        <title>Ej 1</title>
    </head>
    <body>

        <?php
           $a=random_int(1,100);
           $b=random_int(1,100);
           $c=random_int(1,100);
           $d="Hola";
           $e=random_int(0,1);
        ?>
        <br>
        <ul>
            <li>Valor de la variable a: <?= $a?></li>
            <li>Valor de la variable b: <?= $b?></li>
            <li>Valor de la variable c: <?= $c?></li>
            <li>Valor de la variable d: <?= $d?></li>
            <li>Valor de la variable e: <?= $e ? 'true' : 'false'?></li>
        </ul>
        <h1>Operaciones</h1>
        <ul>
            <li>Suma de a + b: <?= $a+$b?></li>
            <li>Resta de b - c: <?= $b-$c?></li>
            <li>Multiplicacion de a * c: <?= $a*$c?></li>
            <li>Division de 1024 / c: <?= 1024/$c?></li>
            <li>Comprobacion que d y e sean del mismo valor y tipo: <?= $d === $e ? 'true' : 'false'?> </li>
            <li>Comprobacion que a y b sean el mismo numero: <?= $a == $b ? 'true' : 'false'?> </li>
        </ul>
    </body>
</html>