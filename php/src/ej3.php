<!DOCTYPE html>
<html>
    <head>
        <title>Ej 3</title>
    </head>
    <body>

        <?php
            $array=[];
            for ($i=0; $i < 5; $i++) { 
                $array[]=random_int(1,100);
            }
            echo "Numeros del array <br>";
            foreach ($array as $numero) {
                echo "$numero <br>";
            }
            function media($array){
                $suma=0;
                foreach ($array as $numero) {
                    $suma+=$numero;
                }
                return $suma/count($array);
            }

           echo "<p> Media del array: ". media($array)."</p>";
        ?>
        <br>

    </body>
</html>