<?php
const EDAD_MAXIMA = 66;
class Persona
{
    private string $nombre;
    private string $apellidos;
    private int $edad;

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
}
