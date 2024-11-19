Ejercicio 1 – (1 punto)
Escribe un programa que muestre tres secuencias aleatorias de 10 bits y una cuarta secuencia que indique cuál es el bit más común en esa posición.

<?php
echo "<pre>";

$secuencias = array();
for ($i = 0; $i < 3; $i++) {
    $secuencia = '';
    for ($j = 0; $j < 10; $j++) {
        $secuencia .= rand(0, 1);
    }
    $secuencias[] = $secuencia;
}

echo "A: $secuencias[0]\n";
echo "B: $secuencias[1]\n";
echo "C: $secuencias[2]\n";

echo "</pre>";
?>