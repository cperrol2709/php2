Escriba un programa:

que muestre primero un grupo de entre 10 y 20 emoticonos al azar (rango unicode: 128512 a 128580).
que indique si un emoticono al azar (del mismo rango unicode) está en el grupo o no.

<?php
$numero = rand(10, 20);

// Guardamos los valores de los emoticonos en la matriz $emoticonos
$emoticonos = [];
for ($i = 0; $i < $numero; $i++) {
    $emoticonos[$i] = rand(128512, 128580);
}

// Mostramos las imágenes de los emoticonos obtenidos
print "  <h2>$numero emoticonos ...</h2>\n";
print "\n";
print "  <p style=\"font-size: 400%; margin: 0;\">\n";
foreach ($emoticonos as $emoticono) {
    print "    &#$emoticono;\n";
}
print "  </p>\n";
print "\n";

// Emoticono a buscar
$busca = rand(128512, 128580);

// Mostramos el resultado de la búsqueda
if (in_array($busca, $emoticonos)) {
    print "  <p>El emoticono <span style=\"font-size: 400%;\">&#$busca;</span> está entre ellos.</p>\n";
} else {
    print "  <p>El emoticono <span style=\"font-size: 400%;\">&#$busca;</span> NO está entre ellos.</p>\n";
}
print "\n";

?>