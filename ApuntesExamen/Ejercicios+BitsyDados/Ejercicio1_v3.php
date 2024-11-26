<?php
$numero = 10;

// Creamos la matriz de bits aleatorios y la matriz con valores complementarios
$inicial   = [];
$resultado = [];
for ($i = 0; $i < $numero; $i++) {
    $inicial[$i] = rand(0, 1);
    $resultado[$i] = $inicial[$i] == 1 ? 0 : 1;
}

// Mostramos los bits aleatorios
print "  <pre style=\"font-size: 300%;\">\n";
print "A: ";
foreach ($inicial as $bit) {
    print "$bit ";
}
print "\n";
print "\n";

// Mostramos los valores complementarios
print "<span style=\"text-decoration: overline\">A</span>: ";
foreach ($resultado as $bit) {
    print "$bit ";
}
print "\n";
print "</pre>\n";
?>