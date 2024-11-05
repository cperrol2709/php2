<?php

require_once 'herencia.php';

$articuloRebajado = new ArticuloRebajado("Bicicleta", 352.10, 20);

echo $articuloRebajado;

echo "El precio del artículo rebajado es " . $articuloRebajado->precioRebajado() . " €<br />";

var_dump($articuloRebajado);
?>
