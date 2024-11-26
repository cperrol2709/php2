Escriba un programa que enfrente a dos jugadores tirando una serie de dados al azar entre 2 y 7 e indique el resultado. Los dados se comparan en orden (el primero con el primero, el segundo con el segundo, etc.) y gana el jugador que obtenga el número más alto.

<?php
$numero = rand(2, 7);

print "  <h2>Jugador 1</h2>\n";
print "\n";

// Guardamos los valores del Jugador 1 en la matriz $dados1
$dados1 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados1[$i] = rand(1, 6);
}

// Mostramos los resultados obtenidos por el Jugador 1
print "  <p>\n";
foreach ($dados1 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

print "  <h2>Jugador 2</h2>\n";
print "\n";

// Guardamos los valores del Jugador 2 en la matriz $dados2
$dados2 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados2[$i] = rand(1, 6);
}

// Mostramos los resultados obtenidos por el Jugador 2
print "  <p>\n";
foreach ($dados2 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

// En los acumuladores $gana1 $gana2 y $empate contamos cuántas partidas ha ganado cada uno
print "  <h2>Resultado</h2>\n";
print "\n";

$gana1 = 0;
$gana2 = 0;
$empate = 0;
for ($i = 0; $i < $numero; $i++) {
    if ($dados1[$i] > $dados2[$i]) {
        $gana1++;
    } elseif ($dados1[$i] < $dados2[$i]) {
        $gana2++;
    } else {
        $empate++;
    }
}

// Mostramos cuántas partidas ha ganado cada uno
print "  <p>El jugador 1 ha ganado <strong>$gana1</strong> ";
print $gana1 != 1 ? "veces" : "vez";
print ", el jugador 2 ha ganado <strong>$gana2</strong>";
print $gana2 != 1 ? "veces" : "vez";
print " y los jugadores han empatado <strong>$empate</strong>";
print $empate != 1 ? "veces" : "vez";
print ".</p>\n";
print "\n";

// Mostramos quién ha ganado la partida
if ($gana1 > $gana2) {
    print "  <p>En conjunto, ha ganado el jugador <strong>1</strong>.</p>\n";
} elseif ($gana1 < $gana2) {
    print "  <p>En conjunto, ha ganado el jugador <strong>2</strong>.</p>\n";
} else {
    print "  <p>En conjunto, han empatado.</p>\n";
}
?>