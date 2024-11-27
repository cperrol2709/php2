Escriba un programa:

que muestre primero un grupo de entre 5 y 10 cartas de tréboles al azar (los valores se pueden repetir).
que indique y muestre cuál es la carta más alta del grupo.
que elimine esa carta del grupo (puede haber varias) y muestre el grupo restante.
que indique cuál es la carta más alta del grupo restante.

<?php
// Guardamos los valores de las cartas en la matriz $cartas
$n = rand(5, 10);
for ($i = 0; $i < $n; $i++) {
    $cartas[] = rand(1, 10);
}

// Mostramos las imágenes de las cartas obtenidas
print "  <h2>Cartas</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/t$carta.svg\" alt=\"$carta de tréboles\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Calculamos el valor máximo
$eliminar = max($cartas);

// Mostramos el valor máximo
print "<p>La carta más alta es un $eliminar.</p>\n";
print "\n";

// Mostramos la carta de valor máximo
print "  <h2>Carta a eliminar</h2>\n";
print "\n";
print "  <p>\n";
print "    <img src=\"img/cartas/t$eliminar.svg\" alt=\"$eliminar de tréboles\" width=\"100\">\n";
print "  </p>\n";
print "\n";

// Recorremos la matriz de valores de cartas y eliminamos los elementos que coinciden con el máximo
for ($i = 0; $i < $n; $i++) {
    if ($cartas[$i] == $eliminar) {
        unset($cartas[$i]);
    }
}

// Mostramos las imágenes de las cartas (las eliminadas ya no se mostrarán)
print "  <h2>Cartas restantes</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/t$carta.svg\" alt=\"$carta de tréboles\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Calculamos y mostramos el valor máximo actual
print "<p>La carta más alta es ahora un " . max($cartas) . ".</p>\n";
print "\n";

?>