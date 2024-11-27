Escriba un programa:

que muestre primero un grupo de entre 7 y 20 corazones al azar (rango unicode: 128147 a 128152).
que indique cuantas veces ha aparecido cada corazón.

<?php
$numero = rand(7, 20);

// Guardamos los valores de las frutas en la matriz $frutas
$frutas = [];
for ($i = 0; $i < $numero; $i++) {
    $frutas[$i] = rand(128147, 128152);
}

// Mostramos las imágenes de las frutas obtenidas
print "  <h2>$numero corazones</h2>\n";

print "\n";
print "  <p style=\"font-size: 400%; margin: 0;\">\n";
foreach ($frutas as $fruta) {
    print "    &#$fruta;\n";
}
print "  </p>\n";
print "\n";

// Contamos las frutas
$cuenta = array_count_values($frutas);

// Mostramos el resultado de contar las frutas
print "  <h2>Conteo</h2>\n";
print "\n";

foreach ($cuenta as $indice => $valor) {
    print "  <p style=\"font-size: 400%; margin: 0;\">&#$indice; $valor</p>\n";
}

print "\n";

?>