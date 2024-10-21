<?php
include_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Empleado;
use App\Models\Empresa;

$empresa = new Empresa();
$persona1 = new Empleado('Ignasi', 'Gomis Mullor', 50);
$persona2 = new Empleado('Juan', 'Segura Vasco', 50);
$persona1->setSou(2500);
$persona2->setSou(2500);
$empresa->addWorker($persona1);
$empresa->addWorker($persona2);
$empleados=$empresa->getEmpleados();
?>

<body>
    <h1>Informe Aleatorio</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga deserunt aliquam eum pariatur laudantium a quaerat eligendi quam accusamus adipisci, incidunt molestias? Asperiores, non maxime eveniet debitis officiis iusto dolor.</p>
    <table>
        <tr>
            <th>Nom</th>
            <th>Sou</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?= $empleado->getNomComplet() ?></td>
                <td><?= $empleado->getSou() ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>Total: <?= $empresa->getCosteNominas() ?></td>
        </tr>
    </table>
</body>

</html>