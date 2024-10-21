<?php
include_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\EmpleadoController;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\JsonFormatter;
use Dompdf\Dompdf;


$dompdf = new Dompdf();
$rfh = new RotatingFileHandler("logs/milog.log", Logger::DEBUG);
$rfh->setFormatter(new JsonFormatter());

$log = new Logger('Empresa');
$log->pushHandler(new StreamHandler("logs/app.log", Logger::DEBUG));
$log->pushHandler(new FirePHPHandler(Logger::DEBUG));
$log->pushProcessor(new IntrospectionProcessor());
$log->pushHandler(new StreamHandler("logs/warning.log", Logger::WARNING));
$log->pushHandler(new FirePHPHandler(Logger::WARNING));

$log->pushHandler(new StreamHandler("logs/critical.log", Logger::ERROR));
$log->pushHandler(new FirePHPHandler(Logger::ERROR));
$log->pushHandler($rfh);

$log->info('Esta entrada es de informacion');
$log->error('Esta entrada es de error');

$controller = new EmpleadoController();
$controller->listAll();
