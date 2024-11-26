Ejercicio 2:
Escribe un programa que muestre una secuencia aleatoria de 10 bits y la detección de cambios de
bits consecutivos en la secuencia. Es decir:
• si en la primera secuencia un bit es igual al bit siguiente, el bit correspondiente del resultado
será 0
• si en la primera secuencia un bit es distinto al bit siguiente, el bit correspondiente del
resultado será 1
Pista: En el bucle que genera la matriz resultado se debe comparar cada valor de la secuencia inicial
con el valor siguiente.

<?php

$numero = 10; // Número de bits en la secuencia

// Generamos la secuencia inicial de 10 bits aleatorios
$secuencia1 = [];
for ($i = 0; $i < $numero; $i++) {
    $secuencia1[$i] = rand(0, 1); // Cada posición de la secuencia tendrá un valor aleatorio: 0 o 1
}

print "<pre style=\"font-size: 300%;\">\n"; // Ajusta el tamaño del texto en la salida HTML
print "A: "; // Etiqueta para mostrar la secuencia inicial

// Mostramos la secuencia inicial
for ($i = 0; $i < $numero; $i++) {
    print "$secuencia1[$i] "; // Imprimimos cada bit de la secuencia
}

print "\n\n"; // Espacio extra para separar las salidas

// Calculamos el resultado comparando bits consecutivos
$resultado = [];
for ($i = 0; $i < $numero - 1; $i++) { // Hasta $numero - 1 para evitar índices fuera del rango
    if ($secuencia1[$i] == $secuencia1[$i + 1]) {
        $resultado[$i] = 0; // Si el bit actual es igual al siguiente, ponemos un 0 en el resultado
    } else {
        $resultado[$i] = 1; // Si el bit actual es diferente al siguiente, ponemos un 1 en el resultado
    }
}

print "Resultado: "; // Etiqueta para mostrar la secuencia de resultados

// Mostramos la secuencia resultado
for ($i = 0; $i < $numero - 1; $i++) { // Imprimimos todos los valores del array resultado
    print "$resultado[$i] ";
}

print "</pre>"; // Cerramos el bloque de salida formateada
?>

