<?php
include_once __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Empleado;
use App\Models\Empresa;
use Dompdf\Dompdf;


$dompdf = new Dompdf();

ob_start();
include('informe.php');
$html = ob_get_clean();

//include $_SERVER['DOCUMENT_ROOT'] . './informe.php';

//$dompdf->loadHtml(file_get_contents('./informe.php'));
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("document.pdf");
