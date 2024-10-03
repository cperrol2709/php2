/*Escriba un array de ocho ciudades de España. Elimina al azar una de ellas y muestra el nuevo
array de ciudades.*/

<?php
echo"<pre>>";

$array = ["Huelva", "Sevilla", "Madrid", "Cordoba","Barcelona","Badajoz","Cadiz","Almeria"];

$valor = array_rand($array);

print_r($array);

unset($array[$valor]);

print_r($array);

echo"</pre>>";
?>

/* Ejercicio 2
Crea un array de claves valores de países con la siguiente información de cada país:
• Capital
• Población aproximada
• Idiomas principales de ese país
• ¿Si tiene costa?
*/

<?php
echo"<pre>>";

$array = ["Pais" => "España","Capital" => "Madrid","Poblacion" => 47.7 ,"Idiomas" => "Español","Costa" => "No"];

echo "<p>• Pais : " . $array["Pais"] . "</p>";
echo "<p>• Capital : " . $array["Capital"] . "</p>";
echo "<p>• Población aproximada : " . $array["Poblacion"] . "</p>";
echo "<p>• Idiomas principales de ese país : " . $array["Idiomas"] . "</p>";
echo "<p>• ¿Si tiene costa? : " . $array["Costa"] . "</p>";

echo"</pre>>";
?>

/* Ejercicio 3
Haciendo uso de matrices, escriba un programa que muestre una tirada de dado al azar y escriba en letras el valor obtenido. */

<?php
echo"<pre>>";

$array = [1, 2, 3, 4, 5, 6];

$valor = array_rand($array);

$numero = null;

printf($valor);

if($valor === 1)
    printf(" : UNO");
if($valor === 2)
    printf(" : DOS");
if($valor === 3)
    printf(" : TRES");
if($valor === 4)
    printf(" : CUATRO");
if($valor === 5)
    printf(" : CINCO");
if($valor === 6)
    printf(" : SEIS");

echo"</pre>>";
?>

/*Ejercicio 4
Escriba un programa que muestre una tirada de un número de dados al azar entre 2 y 7 e indique los valores obtenidos. Usar solo la sentencia FOR */

<?php

$numDados = rand(2, 7);
echo "Número de dados a lanzar: $numDados\n";


echo "Valores obtenidos:\n";
for ($i = 1; $i <= $numDados; $i++) {
    $resultado = rand(1, 6); 
    echo "Dado $i: $resultado\n";
}
?>

/*Ejercicio 5
Igual que el 4 pero usando FOR y FOREACH */

<?php

$numDados = rand(2, 7);
echo "Número de dados a lanzar: $numDados\n";

$resultados = [];

for ($i = 1; $i <= $numDados; $i++) {
    $resultado = rand(1, 6); 
    $resultados[] = $resultado; 
}

echo "Valores obtenidos:\n";
foreach ($resultados as $index => $valor) {
    echo "Dado " . ($index + 1) . ": $valor\n";
}
?>
