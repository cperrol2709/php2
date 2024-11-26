<?php
$numero = 10;

// Creamos la matriz de bits aleatorios
$inicial = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial[$i] = rand(0, 1);
}

// Mostramos los bits aleatorios de la matriz
print "  <pre style=\"font-size: 300%\">\n";
print "B: ";
foreach ($inicial as $bit) {
    print "$bit ";
}
print "\n";
print "\n";

// Creamos la matriz con el código Gray
$resultado    = [];
$resultado[0] = $inicial[0];
for ($i = 0; $i < $numero - 1; $i++) {
    $resultado[$i + 1] = $inicial[$i] == $inicial[$i + 1] ? 0 : 1;
}

// Mostramos los valores calculados
print "G: ";
foreach ($resultado as $bit) {
    print "$bit ";
}
print "\n";
print "</pre>\n";
?>