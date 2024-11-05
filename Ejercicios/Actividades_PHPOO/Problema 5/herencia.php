<?php

require_once 'class.articulo.php';

final class ArticuloRebajado extends Articulo
{
    private $rebaja;

    public function __construct($nombre, $precio, $rebaja)
    {
        parent::__construct($nombre, $precio);
        $this->rebaja = $rebaja;
    }

    public function calculaDescuento()
    {
        return $this->precio * ($this->rebaja / 100);
    }

    public function precioRebajado()
    {
        return $this->getPrecio() - $this->calculaDescuento();
    }

    public function __toString()
    {
        return parent::__toString() .
            'La rebaja es: ' . $this->rebaja . ' %<br />' .
            'El descuento es: ' . $this->calculaDescuento() . ' €<br />';
    }
}
