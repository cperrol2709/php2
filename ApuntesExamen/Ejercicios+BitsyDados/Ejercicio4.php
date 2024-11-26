Escriba un programa:

que muestre primero una tirada de un número de dados al azar entre 1 y 10
que muestre a continuación un dado al azar.
que muestre de nuevo la tirada inicial, pero habiendo eliminado de la tirada los dados que coincidan con el dado suelto (si hay alguno).

<?php
$numero = rand(1, 10);

// Guardamos los valores de los dados en la matriz $dados
$dados = [];
for ($i = 0; $i < $numero; $i++) {
    $dados[$i] = rand(1, 6);
}

// Mostramos las imágenes de los dados obtenidos
if ($numero == 1) {
    print "  <h2>Tirada de $numero dado</h2>\n";
} else {
    print "  <h2>Tirada de $numero dados</h2>\n";
}
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"80\" height=\"80\">\n";
}
print "  </p>\n";
print "\n";

// Guardamos el valor del dado a descartar
$descarta = rand(1, 6);

// Mostramos el dado a descartar
print "  <h2>Dado a eliminar</h2>\n";
print "\n";
print "  <p>\n";
print "    <img src=\"img/$descarta.svg\" alt=\"$descarta\" width=\"80\" height=\"80\">\n";
print "  </p>\n";
print "\n";

// Eliminamos el dado de la matriz
for ($i = 0; $i < $numero; $i++) {
    if ($dados[$i] == $descarta) {
        unset($dados[$i]);
    }
}

// Mostramos las imágenes de los dados restantes
print "  <h2>Dados restantes</h2>\n";
print "\n";
if (count($dados) == 0) {
    print "<p>No quedan dados.</p>\n";
} else {
    print "  <p>\n";
    foreach ($dados as $dado) {
        print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"80\" height=\"80\">\n";
    }
}
print "  </p>\n";
print "\n";

?>