Problema 3.
Confeccionar una clase Persona que tenga como atributos el nombre y la edad. Definir un método
que cargue los datos personales y otro que los imprima.
Plantear una segunda clase Empleado que herede de la clase Persona. Añadir un atributo sueldo y
los métodos de cargar el sueldo e imprimir su sueldo.
Definir un objeto de la clase Persona y llamar a sus métodos. También crear un objeto de la clase
Empleado y llamar a sus métodos.

<?php
echo "<pre>";

require_once 'Persona.php';

class Empleado extends Persona
{
    private $sueldo;

    public function __construct($nombre,$edad,$sueldo)
    {
        parent::__construct($nombre,$edad);
        $this->sueldo = $sueldo;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo): void
    {
        $this->sueldo = $sueldo;
    }

    public function cargarSueldo($sueldo){
        $this->setSueldo($sueldo);
    }

    public function imprimirSueldo(){
        $this->imprimirDatos();
        echo "Sueldo: " . $this->sueldo;
    }
}

$empleado = new Empleado("Carlos",20,300);
echo $empleado -> imprimirSueldo();

echo "</pre>";
?>