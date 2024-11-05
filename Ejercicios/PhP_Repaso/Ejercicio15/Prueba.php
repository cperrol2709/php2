<?php
echo "<pre>";

require_once 'Vehiculo.php';

$bicicleta = new Bicicleta();
$bicicleta->anda(15); 
echo "Kilometraje de la bicicleta: " . $bicicleta->getKmRecorridos() . " km\n";
echo $bicicleta->hacerCaballito() . "\n";

$coche = new Coche();
$coche->anda(50);
echo "Kilometraje del coche: " . $coche->getKmRecorridos() . " km\n";
echo $coche->quemarRueda() . "\n";

echo "Kilometraje total de todos los vehículos: " . Vehiculo::getKmTotales() . " km\n";

echo "Total de vehículos creados: " . Vehiculo::getVehiculosCreados() . "\n";
echo "</pre>";
?>
