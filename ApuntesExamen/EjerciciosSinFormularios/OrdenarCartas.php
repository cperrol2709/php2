Escriba un programa:

que muestre una mano de entre 5 y 10 cartas del 1 al 5 al azar (rango unicode: 127169 a 127173).
que muestre las cartas que han salido, sin repetir y ordenándolas de menor a mayor.
que muestre cuántas cartas han salido de cada (sin ordenar).
que muestre cuántas cartas han salido de cada, ordenándolas de mayor a menor número de cartas obtenido.
que muestre cuántas cartas han salido de cada, ordenándolas de menor a mayor número de carta.

<?php
$numero = rand(5, 10);

// Creamos la matriz de cartas aleatorias
$cartas = [];
for ($i = 0; $i < $numero; $i++) {
    $cartas[$i] = rand(127169, 127173);
}

// Mostramos las cartas
print "  <h2>Mano de $numero cartas</h2>\n";
print "\n";
print "  <p style=\"font-size: 700%; margin: 0; line-height: 100%;\">\n";
foreach ($cartas as $carta) {
    print "    &#$carta;\n";
}
print "  </p>\n";
print "\n";

// Ordenamos las cartas
$cartas_2 = array_unique($cartas);
sort($cartas_2);

// Mostramos las cartas ordenadas
print "  <h2>Cartas distintas obtenidas (ordenadas)</h2>\n";
print "\n";
print "  <p style=\"font-size: 700%; margin: 0; line-height: 100%;\">\n";
foreach ($cartas_2 as $carta) {
    print "    &#$carta;\n";
}
print "  </p>\n";
print "\n";

// Contamos las cartas
$cartas_3 = array_count_values($cartas);

// Mostramos las cartas contadas
print "  <h2>Número de cartas obtenidas (sin ordenar)</h2>\n";
print "\n";
print "  <p style=\"line-height: 600%;\">\n";
foreach ($cartas_3 as $indice => $valor) {
    print "    <span style=\"font-size: 500%;\">$valor</span> <span style=\"font-size: 700%;\">&#$indice; - </span>\n";
}
print "  </p>\n";
print "\n";

// Ordenamos las cartas
arsort($cartas_3);

// Mostramos las cartas contadas ordenadas
print "  <h2>Número de cartas obtenidas (ordenada)</h2>\n";
print "\n";
print "  <p style=\"line-height: 600%;\">\n";
foreach ($cartas_3 as $indice => $valor) {
    print "    <span style=\"font-size: 500%;\">$valor</span> <span style=\"font-size: 700%;\">&#$indice; - </span>\n";
}
print "  </p>\n";

?>