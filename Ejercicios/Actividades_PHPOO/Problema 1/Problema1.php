Problema 1.
Crea una clase de PHP que permita gestionar los productos de una tienda online. Cada producto
tendrá que tener: título,referencia o SKU, identificador único, precio con impuestos, precio sin
impuestos, porcentaje de impuestos y las unidades en stock.
Sobre la clase anterior, se debe gestionar de forma correcta el precio. Se tendrá que codificar
correctamente el método setter del porcentaje de impuestos. Necesitamos que al cambiar el
porcentaje se recalcule el precio con impuestos.
Nota: el precio final de un producto es precio_sin_impuestos multiplicado por
porcentaje_impuestos divido entre 100 y sumándole 1. Es decir: precio_sin_impuestos * (1 +
porcentaje_impuestos / 100);
100 * ( 1 + 21 / 100 ) => 121€
El nombre del fichero debería de ser Producto.php o Producto.class.php.

<?php
echo "<pre>";

class Producto
{

    protected $titulo;

    protected $referencia;

    protected $identificador;

    protected $precio_con_impuestos;

    protected $precios_sin_impuestos;

    protected $porcentajes_impuestos;

    protected $stock;

    public function __construct($titulo, $referencia, $identificador, $precio_con_impuestos, $precios_sin_impuestos, $porcentajes_impuestos, $stock)
    {
        $this->titulo = $titulo;
        $this->referencia = $referencia;
        $this->identificador = $identificador;
        $this->precio_con_impuestos = $precio_con_impuestos;
        $this->precios_sin_impuestos = $precios_sin_impuestos;
        $this->porcentajes_impuestos = $porcentajes_impuestos;
        $this->stock = $stock;
    }

    // Metodos getter y setter implementando los correspondientes cambios

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getReferencia()
    {
        return $this->referencia;
    }

    public function setReferencia($ref)
    {
        $this->referencia = $ref;
    }

    public function getIdentificador()
    {
        return $this->identificador;
    }

    public function setIdentificador($id)
    {
        $this->identificador = $id;
    }

    public function getPrecios_sin_impuestos()
    {
        return $this->precios_sin_impuestos;
    }

    public function setPrecios_sin_impuestos($psi)
    {
        $this->precios_sin_impuestos = $psi;
        $this->actualizarPrecioConImpuestos(); // Recalcula el precio con impuestos
    }

    public function getPrecio_con_impuesto()
    {
        return $this->precio_con_impuestos;
    }

    public function getPorcentaje_impuesto()
    {
        return $this->porcentajes_impuestos;
    }

    public function setPorcentaje_impuesto($Porcentaje_impuesto)
    {
        $this->porcentajes_impuestos = $Porcentaje_impuesto;
        $this->actualizarPrecioConImpuestos(); // Recalcula el precio con impuestos
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    // Metodo para actualizar el precio con impuestos
    private function actualizarPrecioConImpuestos()
    {
        $this->precio_con_impuestos = $this->precios_sin_impuestos * (1 + $this->porcentajes_impuestos / 100);
    }
};

$producto = new Producto("Camiseta", "SKU12345", 1, 0, 100, 21, 50);

// Mostrar detalles del producto
echo "Título: " . $producto->getTitulo() . "\n";
echo "SKU: " . $producto->getReferencia() . "\n";
echo "ID: " . $producto->getIdentificador() . "\n";
echo "Precio sin impuestos: " . $producto->getPrecios_sin_impuestos() . "€\n";
echo "Porcentaje de impuestos: " . $producto->getPorcentaje_impuesto() . "%\n";
echo "Precio con impuestos: " . $producto->getPrecio_con_impuesto() . "€\n";
echo "Stock: " . $producto->getStock() . "\n";

$producto->setPorcentaje_impuesto(10); 
echo "Nuevo porcentaje de impuestos: " . $producto->getPorcentaje_impuesto() . "%\n";
echo "Nuevo precio con impuestos: " . $producto->getPrecio_con_impuesto() . "€\n";

echo "</pre>";
?>