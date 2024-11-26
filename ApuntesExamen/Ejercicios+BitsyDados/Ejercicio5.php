Escriba un programa:

que muestre primero un grupo de entre 20 y 30 animales al azar (rango unicode: 128000 a 128060).
que muestre a continuación un animal al azar, pero que sea siempre uno de los anteriores.
que muestre de nuevo el grupo inicial, pero habiendo eliminado del grupo los animales que coincidan con el animal suelto (al menos habrá uno).

<?php
$numero = rand(20, 30);

// Guardamos los valores de los animales en la matriz $animales
$animales = [];
for ($i = 0; $i < $numero; $i++) {
    $animales[$i] = rand(128000, 128060);
}

// Mostramos las imágenes de los animales obtenidos
print "  <h2>$numero animales</h2>\n";

print "\n";
print "  <p style=\"font-size: 400%; margin: 0;\">\n";
foreach ($animales as $animal) {
    print "    &#$animal;\n";
}
print "  </p>\n";
print "\n";

// Guardamos el valor del animal a descartar
$descarta = $animales[rand(0, $numero - 1)];

// Mostramos el animal a descartar
print "  <h2>Animal a eliminar</h2>\n";
print "\n";
print "  <p style=\"font-size: 400%; margin: 0;\">\n";
print "    &#$descarta;\n";
print "  </p>\n";
print "\n";

// Eliminamos el animal de la matriz
for ($i = 0; $i < $numero; $i++) {
    if ($animales[$i] == $descarta) {
        unset($animales[$i]);
    }
}

// Mostramos las imágenes de los animales restantes
print "  <h2>Quedan " . count($animales) . " animales</h2>\n";
print "\n";
if (count($animales) == 0) {
    print "<p>No quedan animales.</p>\n";
} else {
    print "  <p style=\"font-size: 400%; margin: 0;\">\n";
    foreach ($animales as $animal) {
        print "    &#$animal;\n";
    }
}
print "  </p>\n";
print "\n";

?>