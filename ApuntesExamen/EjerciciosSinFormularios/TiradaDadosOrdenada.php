Escriba un programa que muestre una tirada de un número de dados al azar entre 2 y 7 y los ordene de menor a mayor.

<?php
$numero = rand(2, 7);

// Creamos la matriz de dados aleatorios
$dados = [];
for ($i = 0; $i < $numero; $i++) {
    $dados[$i] = rand(1, 6);
}

// Mostramos los dados
print "  <h2>Tirada de $numero dados</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Ordenamos los dados
sort($dados);

// Mostramos los dados ordenados
print "  <h2>Tirada ordenada</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}
print "  </p>\n";

?>