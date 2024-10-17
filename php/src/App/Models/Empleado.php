<?php

namespace App\Models;

include_once("../../../vendor/autoload.php");

use App\Models\Perosna;

class Empleado extends Persona
{
    private float $sou;
    private array $telefons = [];
    public function __construct(string $nom, string $cognoms, int $edat = 25)
    {
        parent::__construct($nom,  $cognoms,  $edat);
    }
    public function __toString(): string
    {
        return $this->getNomComplet();
    }
    public function anyadirTelefono(int $telefon): void
    {
        $this->telefons[] = $telefon;
    }
    public function listarTelefonos(): string
    {
        return implode(",", $this->telefons);
    }
    public function vaciarTelefonos(): void
    {
        $this->telefons = [];
    }
    public function debePagarImpuestos(): bool
    {
        return $this->sou > 3333;
    }
    public function setSou(float $newSou)
    {
        $this->sou = $newSou;
    }
    public function getSou()
    {
        return $this->sou;
    }
    public static function toHtml(Persona $emp): string
    {
        $codeHTML = [];
        $codeHTML[] = "<h1>" . $emp->getNomComplet() . "</h1>";
        if ($emp instanceof Empleado) {
            $codeHTML[] = "<p> Numeros de telefono del empleado: </p>";
            $codeHTML[] = "<ol>";

            foreach ($emp->telefons as $telefonos => $telefono) {
                $codeHTML[] = "<li>" . $telefono . "</li>";
            }
            $codeHTML[] = "</ol>";
        }
        return implode(" ", $codeHTML);
    }
}