Ejercicio 1
Generar una matriz con el conjunto de números primos que hay entre dos números enteros
positivos y mostrarlo en pantalla.

<?php
echo "<pre>";//Creamos un array vacio

$conjunto = [];// 

$numero1 = 1;  // Inicio del rango
$numero2 = 100; // Fin del rango

// Recorrer los números en el rango
for ($num = $numero1; $num <= $numero2; $num++) {
    if ($num > 1) { 
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
echo "<pre>";

// Tamaño de la secuencia
$N = 10;

// Generar y mostrar la secuencia aleatoria y su complementaria
echo "Secuencia aleatoria: ";
for ($i = 0; $i < $N; $i++) {
    $bit = rand(0, 1);  // Genera un bit aleatorio
    echo $bit;  // Imprime el bit aleatorio
}

echo " Secuencia complementaria: ";
for ($i = 0; $i < $N; $i++) {
    $bit = rand(0, 1);  // Volvemos a generar un bit aleatorio para el complementario
    echo $bit == 0 ? 1 : 0;  // Imprime el bit complementario
}

echo "</pre>";
?>
