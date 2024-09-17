<!DOCTYPE html>
<html>
    <head>
        <title>Ej 6</title>
    </head>
    <body>

        <?php
            function resultado(int $a): string {
            return match ($a){
                    10 => "Excelente",
                    9,8 => "Muy bien",
                    7,6,5 => "Bien",
                    default => "Insuficiente"
            };
            }
            for ($i=0; $i <= 10; $i++) { 
                echo "<p>Resultado del numero ".$i.": ". resultado($i) . "</p>";
            }

        ?>
    </body>
</html>