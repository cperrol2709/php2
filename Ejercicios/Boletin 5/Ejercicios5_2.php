Ejercicio 1
Generar una matriz con el conjunto de números primos que hay entre dos números enteros
positivos y mostrarlo en pantalla.

<?php
echo "<pre>";

$conjunto = [];

$numero1 = 1;  // Inicio del rango
$numero2 = 100; // Fin del rango

// Recorrer los números en el rango
for ($num = $numero1; $num <= $numero2; $num++) {
    if ($num > 1) { // Los números primos son mayores que 1
        $esPrimo = true;
        // Verificar si el número es primo
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $esPrimo = false;
                break;
            }
        }
        // Si es primo, agregar al conjunto
        if ($esPrimo) {
            $conjunto[] = $num;
        }
    }
}

print_r($conjunto);

echo "</pre>";
?>

Ejercicio 2
Escriba un programa que muestre una secuencia aleatoria de N bits y su secuencia
complementaria. 

<?php
echo"<pre>>";

echo"</pre>>";
?>