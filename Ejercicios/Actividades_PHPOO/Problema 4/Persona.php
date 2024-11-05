<?php
echo "<pre>";

abstract class Persona
{

    private $nombre;
    private $edad;

    public function __construct($nombre,  $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setEdad($edad): void
    {
        $this->edad = $edad;
    }

    public function cargarDatos($nombre, $edad)
    {
        $this->setNombre($nombre);
        $this->setEdad($edad);
    }

    public function imprimirDatos()
    {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Edad : " . $this->edad . "\n";
    }
}

$persona = new Persona("Juan",30);
echo $persona -> imprimirDatos(); 

echo "</pre>";
?>