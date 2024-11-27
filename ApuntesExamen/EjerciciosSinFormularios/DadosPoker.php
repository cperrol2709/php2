Escriba un programa que muestre un grupo de entre 5 y 10 cartas de valores numéricos de una baraja francesa, al azar. Las cartas se pueden repetir.

En este ejercicio el valor del atributo alt indica el valor y el palo de la carta. Por ejemplo:

<?php
// Guardamos los nombres de los cuatro palos
$palos        = ["c", "d", "p", "t"];
$nombresPalos = ["corazones", "diamantes", "picas", "tréboles"];

// No guardamos los valores de las cartas
// Los generaremos cuando mostremos las cartas
$n = rand(5, 10);

// Mostramos las imágenes de las cartas obtenidas
print "  <h2>Extracción de $n cartas</h2>\n";
print "\n";
print "  <p>\n";
for ($i = 0; $i < $n; $i++) {
    $palo   = array_rand($palos);
    $numero = rand(1, 10);
    print "    <img src=\"img/cartas/$palos[$palo]$numero.svg\" alt=\"$numero de $nombresPalos[$palo]\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";
?>