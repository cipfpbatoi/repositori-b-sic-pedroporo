<!DOCTYPE html>
<html>
    <head>
        <title>Ej 5</title>
    </head>
    <body>

        <?php
            function crearArrayTabla(int $desde,int $hasta) {
                $tablas=[];
                for ($i=$desde; $i<=$hasta; $i++) { 
                    $tabla=[];
                    for ($a=0; $a<=10; $a++) { 
                        $tabla["$i * $a"]=$i*$a;
                        
                    }
                    //echo " Test {$tabla["$i * 1"]} <br>";
                    $tablas["$i"]=$tabla;
                }
                return $tablas;
            }
            $multipli=crearArrayTabla(0,5);
            foreach ($multipli as $tabla => $operaciones) { 
                echo "<table style='border: 1px solid'>";
                echo "<tr><td style='border: 1px solid'>Tabla del $tabla</td></tr>";
                foreach ($operaciones as $operacion => $resultado) { 
                    echo "<tr>";
                    echo "<td style='border: 1px solid'>$operacion</td><td style='border: 1px solid'>$resultado</d>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
        <br>
    </body>
</html>