Escriba un programa que muestre un grupo de entre 5 y 10 cartas de valores numéricos de una baraja francesa, al azar. Las cartas NO se pueden repetir y pertenecen al mismo palo.

<?php
// Guardamos todos los valores de las cartas en la matriz $mazo
$n    = rand(5, 10);
$mazo = range(1, 10);
// Extraemos el número de cartas deseado
$cartas = array_rand($mazo, $n);
// Barajamos las cartas extraidas
shuffle($cartas);

// Mostramos las imágenes de las cartas guardadas en $cartas
print "  <h2>$n cartas sin repetición</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/c$mazo[$carta].svg\" alt=\"$mazo[$carta] de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";
?>