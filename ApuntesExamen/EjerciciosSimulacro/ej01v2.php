<?php
$numero = 10;

// Creamos la primera matriz de bits aleatorios
$inicial1 = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial1[$i] = rand(0, 1);
}

// Mostramos los bits aleatorios de la primera matriz
print "  <pre style=\"font-size: 300%;\">\n";
print "A: ";
foreach ($inicial1 as $bit) {
    print "$bit ";
}
print "\n";
print "\n";

// Creamos la segunda matriz de bits aleatorios
$inicial2 = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial2[$i] = rand(0, 1);
}

// Mostramos los bits aleatorios de la segunda matriz
print "B: ";
foreach ($inicial2 as $bit) {
    print "$bit ";
}
print "\n";
print "\n";

// Creamos la tercera matriz de bits aleatorios
$inicial3 = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial3[$i] = rand(0, 1);
}

// Mostramos los bits aleatorios de la tercera matriz
print "C: ";
foreach ($inicial3 as $bit) {
    print "$bit ";
}
print "\n";
print "\n";

// Creamos la matriz con el resultado
$resultado = [];
for ($i = 0; $i < $numero; $i++) {
    $resultado[$i] = $inicial1[$i] + $inicial2[$i] + $inicial3[$i] > 1 ? 1 : 0;
}

// Mostramos los valores calculados
print "R: ";
foreach ($resultado as $bit) {
    print "$bit ";
}
print "\n";
print "</pre>\n";
?>