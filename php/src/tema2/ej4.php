<!DOCTYPE html>
<html>
    <head>
        <title>Ej 4</title>
    </head>
    <body>

        <?php
            $frase=$_POST['frase'];
            echo "Frase: $frase <br>";
            
            function numVocales(string $frase){
                $vocales=["a","e","i","o","u"];
                $num=0;
                foreach (str_split(strtolower($frase)) as $letra) {
                    if (in_array($letra,$vocales)) {
                        $num++;
                    }
                }
                return $num;
            }
            echo "Num vocales: ". numVocales($frase) . ".";
        ?>
        <br>
        <form name="form" action="" method="post">
        <input type="text" name="frase" id="frase" value="">
        </form>
    </body>
</html>