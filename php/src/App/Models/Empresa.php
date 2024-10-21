<?php

namespace App\Models;

use App\Models\Empleado;

class Empresa
{
    private array $empleados;
    public function __construct()
    {
        $this->empleados = [];
    }
    public function getEmpleados()
    {
        return $this->empleados;
    }
    public function addWorker(Empleado $t)
    {
        $this->empleados[] = $t;
    }
    public function listWorkersHtml(): string
    {
        $codeHTML = [];
        foreach ($this->empleados as $empleados => $empleado) {
            $codeHTML[] = $empleado->toHtml($empleado);
        }
        return implode("", $codeHTML);
    }
    public function getCosteNominas(): float
    {
        $total = 0.00;
        foreach ($this->empleados as $empleado) {
            $total += $empleado->getSou();
        }
        return $total;
    }
}
