Ejercicio 1
Escribe un programa que cada vez que se ejecute genere un número aleatorio entre 1 y 10. A
continuación guarde en una matriz la tabla de multiplicar de dicho número. Obtén el valor
mínimo y máximo de la matriz generada.
NOTA: Para generar la matriz utiliza la función RANGE.

<?php
echo "<pre>";

$numero = rand(1,10); //Generamos un numero aleatorio

echo "Vamos a ver la tabla del $numero \n";//Mostramos que numero sacamos 

$array = range(0,$numero*10,$numero);//Creamos el array desde que el minimo sea 0 hasta que el maximo sea el numero generado por 10 y la diferencia entre cada numero sea el numero generado 

$maximo = max($array); //Sacamos el max del array
$minimo = min($array); //Sacamos el min del array

print_r($array); //Mostramos el array

echo "El maximo del array ha sido : " . $maximo . "\n"; //MOstramos el maximo numero del array
echo "El minimo del array ha sido : " . $minimo . "\n"; //Mostramos el minimo numero del array

echo "</pre>";
?>

Ejercicio 2
Dadas las siguientes tablas con nombre y edad de los alumnos de dos clases diferentes:
Clase A Clase B
Nombre Edad Nombre Edad
Juan 21 Jaime 27
María 19 Luisa 21
Pedro 24 Aitor 33
Antonio 30 Macarena 22
Carmen 24 María 27
Carlos 26 Pedro 28
Lucía 22 Juan 24
- Crea dos arrays independientes para guardar los datos de cada una de las tablas
anteriores y muestra por pantalla la información de ambas.
- A continuación une ambas tablas en una sola y muestra los datos de esta nueva tabla

<?php
echo "<pre>";

//Creamos los dos arrays
$clase_a = array (
    "Juan" => 21,
    "Maria" => 19,
    "Pedro" => 24,
    "Antonio" => 30,
    "Carmen" => 24,
    "Carlos" => 26,
    "Lucia" => 22,
);

$clase_b = array (
    "Jaime" => 27,
    "Luisa" => 21,
    "Aitor" => 33,
    "Macarena" => 22,
    "Maria" => 27,
    "Pedro" => 28,
    "Juan" => 24,
);

//Los mostramos
print_r($clase_a);
print_r($clase_b);

//Los unimos con array_merge
$union = array_merge($clase_a,$clase_b);

//Mostramos el array unido
print_r($union);

echo "</pre>";
?>