Escriba un programa que muestre una secuencia aleatoria de 10 bits y su secuencia complementaria.

<?php
$numero = 10;

// Creamos la matriz de bits aleatorios
for ($i = 0; $i < $numero; $i++) {
    $inicial[] = rand(0, 1);
}

// Mostramos los bits aleatorios
print "  <pre style=\"font-size: 300%;\">\n";
print "A: ";
for ($i = 0; $i < $numero; $i++) {
    print "$inicial[$i] ";
}
print "\n";
print "\n";

// Creamos la matriz con los valores complementarios
for ($i = 0; $i < $numero; $i++) {
    $resultado[$i] = $inicial[$i] == 1 ? 0 : 1;
}

// Mostramos los valores complementarios
print "<span style=\"text-decoration: overline\">A</span>: ";
for ($i = 0; $i < $numero; $i++) {
    print "$resultado[$i] ";
}
print "</pre>\n";
?>