Ejercicio 1
Hacer un código con bucles anidados de variables independientes, donde la variable del bucle
exterior ($i) tome valores numéricos entre 1 y 3, y la del bucle interior ($j) valores entre a y d.
Los resultados se deben ver de la siguiente forma:
Sentencia de la variable $i incluyendo el valor
Sentencia de la variable $j incluyendo el valor
Sentencia de la variable $j incluyendo el valor
…
Sentencia de la variable $i incluyendo el valor
Sentencia de la variable $j incluyendo el valor
Sentencia de la variable $j incluyendo el valor

<?php
echo "<pre>";

for ($i = 1; $i <= 3; $i++) {
    // Mensaje de la variable $i
    echo "Sentencia de la variable \$i incluyendo el valor: $i\n";

    // Bucle anidado para la variable $j
    for ($j = 'a'; $j <= 'd'; $j++) {
        // Mensaje de la variable $j
        echo "Sentencia de la variable \$j incluyendo el valor: $j\n";
    }

    echo "\n"; // Para separar las iteraciones de $i
}

echo "</pre>";
?>


Ejercicio 2
Hacer un código con bucles anidados de variables dependientes que simule lo siguiente:
- Tienes 2 dados
- Tiras el primero.
- Tiras el segundo tantas veces como el valor obtenido del dado 1.
- Vuelves a tirar el primer dado y repetimos la operación.
- El primer dado, lo tiramos 3 veces.

Mostrar los datos de la siguiente manera:
Sentencia del primer dado incluyendo el valor en la primera tirada
Sentencia del segundo dado incluyendo el valor
Sentencia del segundo dado incluyendo el valor
…
Sentencia del primer dado incluyendo el valor en la segunda tirada
Sentencia del segundo dado incluyendo el valor
Sentencia del segundo dado incluyendo el valor
…
Sentencia del primer dado incluyendo el valor en la tercera tirada
Sentencia del segundo dado incluyendo el valor
Sentencia del segundo dado incluyendo el valor

<?php
echo "<pre>";

//Bucle for para generar el valor del primer dado
for ($i = 1; $i <= 3; $i++) {
    $resultado = rand(1, 6);//Generamos un valor aleatorio entre el 1 y el 6
    echo "Sentencia del primer dado incluyendo el valor : " . $resultado .  " en la " . $i . " tirada \n";//Mostramos

    //Segundo bucle anidado para generar el valor del segundo dado
    for ($j = 1; $j <= $resultado; $j++) {
        $res = rand(1, 6);//Generamos un valor aleatorio entre el 1 y el 6
        echo "Sentencia del segundo dado incluyendo el valor : " . $res .  "\n";//Mostramos
    }
}

echo "</pre>";
?>

Ejercicio 3
Crear un código para calcular el factorial de un número, usando la función FOR.

<?php
echo "<pre>";

// Número para calcular el factorial
$numero = 5;

// Inicializamos la variable para almacenar el resultado del factorial
$factorial = 1;

// Usamos el bucle for para calcular el factorial
for ($i = 1; $i <= $numero; $i++) {
    $factorial *= $i;
}

//Mostramos el factorial
echo "El factorial de " . $numero . " es : " . $factorial .  "\n";

echo "</pre>";
?>