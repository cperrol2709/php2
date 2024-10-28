Problema 2.
Crea una clase Persona con los siguientes atributos: nombre, apellidos y edad.
Crea su constructor y get y set.
Crear las siguientes métodos:
• mayorEdad: indica si es o no mayor de edad.
• nombreCompleto: devuelve el nombre mas apellidos

<?php
echo "<pre>";

class Persona
{
    protected $nombre;

    protected $apellidos;

    protected $edad;

    public function __construct($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nomb)
    {
        $this->nombre = $nomb;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apell)
    {
        $this->apellidos = $apell;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($ed)
    {
        $this->edad = $ed;
    }

    public function mayorEdad()
    {
        if ($this->edad > 18) {
            echo "Es mayor de edad";
        } else {
            echo "Es menor de edad";
        }
    }

    public function nombreCompleto()
    {
        return $this-> nombre + $this -> apellidos;
    }
}

$persona1 = new Persona("Juan", "Perez", 19);

echo $persona1->mayorEdad();
echo $persona1->nombreCompleto();

echo "</pre>";
?>