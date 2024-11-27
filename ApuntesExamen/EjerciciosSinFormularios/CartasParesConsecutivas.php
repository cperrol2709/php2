Escriba un programa:

que muestre un número de cartas de corazones, entre 3 y 12, al azar.
que elimine las cartas impares.
que indique si en las cartas pares restantes hay al menos dos iguales consecutivas.

<?php
// Guardamos los valores de las cartas en la matriz $cartas
$n      = rand(3, 12);
$cartas = [];
for ($i = 0; $i < $n; $i++) {
    $cartas[] = rand(1, 10);
}

// Mostramos las imágenes de las cartas obtenidas
print "  <h2>Las $n cartas</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/c$carta.svg\" alt=\"$carta de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Recorremos la matriz de cartas y si el valor de la carta es par, eliminamos el valor
for ($i = 0; $i < $n; $i++) {
    if ($cartas[$i] % 2) {
        unset($cartas[$i]);
    }
}

// Mostramos las imágenes de las cartas (las eliminadas ya no se mostrarán)
print "  <h2>Sin cartas impares</h2>\n";
print "\n";
print "  <p>\n";
foreach ($cartas as $carta) {
    print "    <img src=\"img/cartas/c$carta.svg\" alt=\"$carta de corazones\" width=\"100\">\n";
}
print "  </p>\n";
print "\n";

// Reindexamos la matriz de cartas para poderla recorrer con un bucle for
// y que los índices sean consecutivos
$cartas = array_values($cartas);

// Recorremos la matriz de cartas (hasta el penúltimo valor)
// comparando cada valor con el siguiente y si coinciden
// damos el valor true a la variable testigo $consecutivas
$consecutivas = false;
for ($i = 0; $i < count($cartas) - 1; $i++) {
    if ($cartas[$i] == $cartas[$i + 1]) {
        $consecutivas = true;
    }
}

// Según el valor de consecutivas mostramos un mensaje distinto
print $consecutivas ? "<p>Hay cartas iguales consecutivas</p>\n" : "<p>No hay cartas iguales consecutivas</p>\n";

?>