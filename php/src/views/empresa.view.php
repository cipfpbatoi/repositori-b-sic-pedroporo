<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Empresa</title>
</head>

<body>

    <table>
        <tr>
            <th>Nom</th>
            <th>Telefons</th>
            <th>Sou</th>
        </tr>
        <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td>Empresa: </td>
                <td>Ver Empleados: </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>