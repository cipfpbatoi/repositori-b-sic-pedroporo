<?php

namespace App\Controllers;

use App\Models\Empresa;
use App\Models\Empleado;

class EmpresaController
{


    public function listAll()
    {
        $empresa1 = new Empresa();
        $empresa2 = new Empresa();
        $persona1 = new Empleado('Ignasi', 'Gomis Mullor', 50);
        $persona2 = new Empleado('Juan', 'Segura Vasco', 50);
        $persona1->setSou(2500);
        $persona2->setSou(2500);
        $empresa1->addWorker($persona1);
        $empresa1->addWorker($persona2);
        $empresa2->addWorker($persona1);
        $empresa2->addWorker($persona2);
        $empresas = [$empresa1, $empresa2];


        include $_SERVER['DOCUMENT_ROOT'] . '/views/empresa.view.php';

        
    }
  

}
