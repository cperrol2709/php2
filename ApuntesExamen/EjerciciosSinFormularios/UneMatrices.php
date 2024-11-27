Escriba un programa:

que muestre primero todos los emoticonos. Los emoticonos se encuentran en los rangos 128512 al 128580, 129296 al 129303, 129312 al 129317, 129319 al 129327, 129392, 129393, 129395 al 129398, 129402 y 129488.
que muestre uno de esos emoticonos al azar.

<?php
// Definimos las matrices con los rangos de emoticonos
$emoticonos_1 = range(128512, 128580);
$emoticonos_2 = range(129296, 129303);
$emoticonos_3 = range(129312, 129317);
$emoticonos_4 = range(129319, 129327);
$emoticonos_5 = [129392, 129393];
$emoticonos_6 = range(129395, 129398);
$emoticonos_7 = [129402, 129488];

// Unimos las matrices en una sola
$emoticonos = array_merge($emoticonos_1, $emoticonos_2, $emoticonos_3, $emoticonos_4, $emoticonos_5, $emoticonos_6, $emoticonos_7);

// Mostramos las imágenes de los emoticonos obtenidos
print "  <h2>". count($emoticonos) . " emoticonos</h2>\n";
print "\n";
print "  <p style=\"font-size: 400%; margin: 0;\">\n";
foreach ($emoticonos as $emoticono) {
    print "    &#$emoticono;\n";
}
print "  </p>\n";
print "\n";

// Mostramos un emoticono al azar
print "  <h2>Uno al azar</h2>\n";
print "\n";
print "  <p style=\"font-size: 400%; margin: 0;\">&#". $emoticonos[rand(0, count($emoticonos)-1)] . ";</p>\n";
