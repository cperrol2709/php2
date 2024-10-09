EJERCICIO 2
Crea el código PHP donde generes:
a) Un bucle for que cuente desde 50 hasta 200 de 10 en 10.

<?php
echo"<pre>>";

//Declaramos un bucle que empieze en 50 y acabe cuando sea menor o igual que 200 , y se vaya incrementando de 10 en 10
for($i = 50;$i <= 200; $i += 10){
    print($i . " ");//Lo mostramos aqui
}

echo"</pre>>";
?>

b) Un bucle for que a partir de una variable de control $j que toma valores de 100 a 500 de 100
en 100, muestre por pantalla el resultado de dividir la variable de control por 20. Por ejemplo,
en el primer caso sería 5 (que es 100/20…).

<?php
echo"<pre>>";

//Declaramos un bucle que empieze en 100 y acabe cuando sea menor o igual que 500 , y se vaya incrementando de 100 en 100
for($j = 100;$j <= 500; $j += 100){
    $div = $j / 20; //Dividimos la variable j entre 20 para que nos de lo que queremos
    print($div . " ");//Lo mostramos
}

echo"</pre>>";
?>