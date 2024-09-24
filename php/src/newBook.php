<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
    $estados=["Bueno" => "bueno","Mediano" => "mediano","Malo" => "malo"];
    $modulos=[
        "Dessarollo web en entorno cliente" => "desarrolloCliente",
        "Dessarollo web en entorno servidor" => "desarrolloServidor",
        "Diseño de interfaces web" => "disenyInterfaces",
        "Despliege de aplicaciones WEB" => "despliege"
    ];
    ?>
<form action="newBook.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module">
        <?php
        foreach ($modulos as $modulo => $valor) { 
            echo "<option value='$valor'>$modulo</option>";
        }
        ?>
        </select>
        <span class="error"><!-- Missatge d'error per al mòdul aquí --></span>
    </div>
    <div>
        <label for="publisher">Editorial:</label>
        <input type="text" id="publisher" name="publisher" value="">
        <span class="error"><!-- Missatge d'error per a l'editorial aquí --></span>
    </div>
    <div>
        <label for="price">Preu:</label>
        <input type="text" id="price" name="price" value="">
        <span class="error"><!-- Missatge d'error per al preu aquí --></span>
    </div>
    <div>
        <label for="pages">Pàgines:</label>
        <input type="text" id="pages" name="pages" value="">
        <span class="error"><!-- Missatge d'error per a les pàgines aquí --></span>
    </div>
    <div>
        <label for="status">Estat:</label><br>
        <?php
        foreach ($estados as $estado => $valor) { 

            echo "<input type='radio' name='status' value='$valor' />$estado <br>";
        }
        ?>
         <span class="error"><!-- Missatge d'error per a l'estat aquí --></span>
    </div>
    <div>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo">
    </div>
    <div>
        <label for="comments">Comentaris:</label>
        <textarea id="comments" name="comments"></textarea>
    </div>
    <div>
        <button type="submit">Donar d'alta</button>
    </div>
</form>
<?php
$libros=openJSON($libros);
function openJSON(&$libros) {
    $archivo=file_get_contents("libros.json");
    $libros=json_decode($archivo,true);
    return $libros;
}
function saveJSON(&$libros) {
    $librosG=json_encode($libros,true);
    $archivo=file_put_contents("libros.json",$librosG);
}
function addBook(&$libros){
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $nombre = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "./imgs/{$nombre}");
    }
    $_POST["photo"]="./imgs/{$nombre}";
    $libros[sizeof($libros)+1]=$_POST;

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addBook($libros);
    saveJSON($libros);
}
/*echo "Valor del array";
echo "<pre>";
print_r($libros);
echo "</pre>";*/
echo"Tablon de libros <br>";
?>

<table style='border: 1px solid'>
    <?php
    echo "<tr><td style='border: 1px solid'>Modulo</td style='border: 1px solid'><td style='border: 1px solid'>Editorial</td><td style='border: 1px solid'>Precio</td><td style='border: 1px solid'>Paginas</td><td style='border: 1px solid'>Estado</td><td style='border: 1px solid'>Comentarios</td><td style='border: 1px solid'>Imagenes</td></tr>";
    foreach ($libros as $libro => $value) {
        echo"<tr>";
        foreach ($value as $valor => $a) {
            if ($valor=="photo") {
                echo "<td style='border: 1px solid'><img src='$a' alt='Libro' style='width:100px;height:100px;'></td>";
            }else{
                echo "<td style='border: 1px solid'>$a</td>";
            }
        }
        
        echo"</tr>";
    }
    ?>
</table>
</body>
</html>

