<?php
// class.articulo.php

class Articulo
{
    protected $nombre;
    protected $precio;

    public function __construct($pNombre, $pPrecio)
    {
        $this->nombre = $pNombre;
        $this->setPrecio($pPrecio);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($pPrecio)
    {
        if (is_numeric($pPrecio)) {
            $this->precio = $pPrecio;
        } else {
            echo "El precio debe ser un valor numerico.<br />";
        }
    }

    public function __toString()
    {
        return 'Nombre: ' . $this->nombre . '<br />' . 'Precio: ' . $this->precio . ' €<br />';
    }
}
