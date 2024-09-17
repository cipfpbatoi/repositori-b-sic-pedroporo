<!DOCTYPE html>
<html>
    <head>
        <title>Ej 2</title>
    </head>
    <body>

        <?php
            echo "Numeros pares del 0 al 20 con for";
            echo "<table>";
            $contadorCeldas=0;
            for ($i=0; $i <= 20; $i++) { 
                if ($contadorCeldas==4) {
                    $contadorCeldas=0;
                    echo "</tr><tr>";
                }
                    if (($i%2)==0) {
                        echo "<td>". $i."</td>";
                        $contadorCeldas++;
                    } 
            }
            echo "</tr></table>";
            echo "Numeros pares del 0 al 20 con while";
            echo "<table>";
            $contadorCeldas=0;
            $a=0;
            while ($a <= 20) {
                if ($contadorCeldas==4) {
                    $contadorCeldas=0;
                    echo "</tr><tr>";
                }
                if (($a%2)==0) {
                        echo "<td>". $a."</td>";
                        $contadorCeldas++;
                }
                $a++; 
                    
            }
            
            echo "</tr></table>";
        ?>
    </body>
</html>