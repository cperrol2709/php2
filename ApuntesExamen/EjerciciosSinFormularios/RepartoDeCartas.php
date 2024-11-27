Matrices (3) 24 - Reparto de cartas
Escriba un programa:

que muestre un número par de cartas de corazones, entre 4 y 12, al azar.
que reparta las cartas entre dos jugadores, al azar.

<?php
// Guardamos los valores de las cartas en la matriz $cartas
// $n es el número de cartas que repartiremos a cada jugador,
// por lo que generamos 2 * $n cartas
$n       = rand(2, 6);
$cartas = [];
for ($i = 0; $i < 2 * $n; $i++) {
    $cartas[] = rand(1, 10);
}

// Mostramos las imágenes de las cartas obtenidas
print "  <h2>Las " . 2 * $n . " cartas a repartir</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/c$carta.svg\" alt=\"$carta de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Barajamos los valores de las cartas
shuffle($cartas);

// Creamos una matriz con las $n primeras cartas
$cartasA = [];
for ($i = 0; $i < $n; $i++) {
    $cartasA[] = $cartas[$i];
}

// Creamos una matriz con las $n siguientes cartas
for ($i = 0; $i < $n; $i++) {
    $cartasB[] = $cartas[$i+ $n];
}

// Mostramos las imágenes de las cartas del primer jugador
print "  <h2>Las $n cartas del jugador A</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartasA as $carta) {
    print "    <img src=\"img/cartas/c$carta.svg\" alt=\"$carta de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Mostramos las imágenes de las cartas del segundo jugador
print "  <h2>Las $n cartas del jugador B</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartasB as $carta) {
    print "    <img src=\"img/cartas/c$carta.svg\" alt=\"$carta de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

?>