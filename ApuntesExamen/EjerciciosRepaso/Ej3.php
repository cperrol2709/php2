Escribe un programa:
• que muestre primero un grupo de entre 5 y 15 bolas numeradas del 1 al 10 al azar (rango
unicode: 10102 a 10111).
• que muestre de nuevo el grupo inicial, pero habiendo eliminado del grupo los valores
repetidos.

<?php

$numero = rand(5, 15); // Número aleatorio entre 5 y 15
$secuencia = [];

// Llenamos la secuencia con números aleatorios
for ($i = 0; $i < $numero; $i++) {
    $secuencia[$i] = rand(1, 10);
}

print "<pre style=\"font-size: 300%;\">\n"; // Ajusta el tamaño del texto en la salida HTML

print "Entre estas $numero bolas:\n";

// Mostramos la secuencia
for ($i = 0; $i < $numero; $i++) {
    print "$secuencia[$i] ";
}

print "\n";

$resultado = array_unique($secuencia);

print "Secuencia sin valores repetidos:\n";
foreach ($resultado as $valor) {
    print "$valor ";
}

print "\n\n";

?>
