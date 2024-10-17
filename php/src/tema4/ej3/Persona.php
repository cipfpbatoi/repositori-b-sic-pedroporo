<?php
namespace ej3\Persona;
abstract class Persona
{
    private string $nombre;
    private string $apellidos;
    private int $edad;
    const EDAD_MAXIMA = 66;
    public function __construct(string $nom, string $cognoms, int $edat = 25)
    {
        $this->nombre = $nom;
        $this->apellidos = $cognoms;
        $this->edad = $edat;
    }

    public function setNombre(string $nom)
    {
        $this->nombre = $nom;
    }
    public function setApellidos(string $cognoms)
    {
        $this->apellidos = $cognoms;
    }
    public function setEdad(int $edat)
    {
        $this->edad = $edat;
    }
    public function getNomComplet(): string
    {

        return "$this->nombre $this->apellidos ";
    }
    public function estaJubilat(): bool
    {
        return $this->edad >= EDAD_MAXIMA;
    }
    public static function toHtml(Persona $p): string
    {
        $codeHTML = [];
        $codeHTML[] = "<h1>" + $p->getNomComplet() + "</h1>";
        return implode(" ", $codeHTML);
    }
}
