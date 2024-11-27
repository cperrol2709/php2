<?php
$numero = rand(2, 7);

print "  <h2>Jugador 1</h2>\n";
print "\n";

// Guardamos los valores del Jugador 1 en la matriz $dados_jugador1
$dados_jugador1 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados_jugador1[$i] = rand(1, 6);
}

// Resultados obtenidos por el Jugador 1
print "  <p>\n";
foreach ($dados_jugador1 as $dado) {
    print " $dado \n";
}
print "  </p>\n";
print "\n";

print "  <h2>Jugador 2</h2>\n";
print "\n";

//Guardamos los valores del 2 jugador en la matriz $dados_jugador2
$dados_jugador2 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados_jugador2[$i] = rand(1, 6);
}

// Resultados obtenidos por el Jugador 2
print "  <p>\n";
foreach ($dados_jugador2 as $dado) {
    print " $dado \n";
}
print "  </p>\n";
print "\n";

print "  <h2>Resultado</h2>\n";
print "\n";

$gana_jugador1 = 0;
$gana_jugador2 = 0;
$empate = 0;

//Bucle for para hacer el conteo de quien gana , si el jugador 1 , jugador 2 o empate
for ($i = 0; $i < $numero; $i++) {
    if ($dados_jugador1[$i] > $dados_jugador2[$i]) {
        $gana_jugador1++;
    } elseif ($dados_jugador1[$i] < $dados_jugador2[$i]) {
        $gana_jugador2++;
    } else {
        $empate++;
    }
}

// Mostramos cuantas partidas ha ganado cada uno
print "  <p>El jugador 1 ha ganado $gana_jugador1";
print $gana_jugador1 != 1 ? " veces" : " vez";
print ", el jugador 2 ha ganado $gana_jugador2";
print $gana_jugador2 != 1 ? " veces" : " vez";
print " y los jugadores han empatado $empate";
print $empate != 1 ? " veces" : " vez";
print ".</p>\n";
print "\n";

// Mostramos quien ha ganado la partida
if ($gana_jugador1 > $gana_jugador2) {
    print "<p>Ha ganado el jugador 1.</p>\n";
} elseif ($gana_jugador1 < $gana_jugador2) {
    print "<p>Ha ganado el jugador 2.</p>\n";
} else {
    print "<p>Han empatado.</p>\n";
}
?>