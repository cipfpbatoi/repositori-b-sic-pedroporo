<?php

namespace App\Models;

include_once("../../../vendor/autoload.php");

use App\Models;

class Empresa
{
    private array $empleados;
    public function __construct()
    {
        $this->empleados = [];
    }
    public function addWorker(Empleado $t)
    {
        $this->empleados[] = $t;
    }
    public function listWorkersHtml(): string
    {
        $codeHTML = [];
        foreach ($this->empleados as $empleados => $empleado) {
            $codeHTML[] = $empleado.toHtml($empleado);
        }
        return implode("", $codeHTML);
    }
}
