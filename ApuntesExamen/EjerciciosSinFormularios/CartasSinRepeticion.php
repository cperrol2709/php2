Escriba un programa que muestre un grupo de entre 5 y 10 cartas de valores numéricos de una baraja francesa, al azar. Las cartas NO se pueden repetir y pertenecen al mismo palo.

<?php
// Guardamos todos los valores de las cartas en la matriz $mazo
$n    = rand(5, 10);
$mazo = range(1, 10);
// Barajamos el mazo de cartas
shuffle($mazo);
// Creamos una nueva matriz con los primeros valores de $mazo (el número de valores que queremos mostrar)
for ($i = 0; $i < $n; $i++) {
    $cartas[$i] = $mazo[$i];
}

// Mostramos las imágenes de las cartas guardadas en $cartas
print "  <h2>$n cartas sin repetición</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/c$carta.svg\" alt=\"$carta de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";
?>