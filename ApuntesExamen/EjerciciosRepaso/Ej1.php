Ejercicio 1:
Escriba un programa que muestre dos secuencias aleatorias de 10 bits y el resultado de hacer la
conjunción lógica ("y" lógico) bit a bit. La conjunción lógica de dos valores da como resultado 1 si
los dos valores son 1.

<?php

$numero = 10;

//Hacemos la secuencia 1
//Creamos una variable vacia donde introduciremos los numeros aleatorios
$secuencia1 = [];
//Hacemos un bucle for 
for ($i = 0; $i <= $numero; $i++) {
    //asiganamos a cada posicion del array un numero aleatorio entre el 0 y el 1
    $secuencia1[$i] = rand(0, 1);
}

print "  <pre style=\"font-size: 300%;\">\n";
print "A:";

//Mostramos la secuencia 1
for ($i = 0; $i < $numero; $i++) {
    print "$secuencia1[$i] ";
}

print "\n";
print "\n";

//Hacemos la secuencia 2
//Creamos una variable vacia donde introduciremos los numeros aleatorios
$secuencia2 = [];
//Hacemos un bucle for 
for ($i = 0; $i <= $numero; $i++) {
    //asiganamos a cada posicion del array un numero aleatorio entre el 0 y el 1
    $secuencia2[$i] = rand(0, 1);
}

print "B:";

//Mostramos la secuencia 2
for ($i = 0; $i < $numero; $i++) {
    print "$secuencia2[$i] ";
}

print "\n";
print "\n";

//Creamos la secuencia 3 
$secuencia3 = [];
//Hacemos un bucle for para recorrer las dos secuencias anteriores
for ($i = 0; $i <= $numero; $i++) {
    //Hacemos una condicion que si la posicion de cada secuencia es 1 entonces la posicion de la secuencia 3 es 1 
    if ($secuencia1[$i] == 1 && $secuencia2[$i] == 1){
        $secuencia3[$i] = 1;
    }else{//Si no la posicion es 0 porque no coindicen las otras posiciones de las secuencias
        $secuencia3[$i] = 0;
    }
}

print "C:";
//Mostramos la secuencia 3
for ($i = 0; $i < $numero; $i++) {
    print "$secuencia3[$i] ";
}
?>