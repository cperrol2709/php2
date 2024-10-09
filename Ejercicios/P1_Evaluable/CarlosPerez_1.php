EJERCICIO 1
Considerad las siguientes variables enteras:
A=6
B=2
C= - 10
Mostrar en pantalla si las siguientes expresiones darían como resultado VERDADERO o FALSO:
a) A es mayor que 3
b) A es mayor que C
c) A es menor que C más B
d) El producto de A y B es 15
e) La suma A+B es 8 y la resta A-B es 4
f) A es mayor que 3, b es mayor que 0 y c es mayor que 3
g) C dividido entre B es menor que (A*C)

<?php
echo"<pre>>";

//Definimos cada una de las variables
$A = 6;
$B = 2;
$C = -10;

//Hacemos condiciones con el if y else
if($A > 3){
echo "a) A es mayor que 3 = Verdadero" . "\n";
}else{
    echo "a) A es mayor que 3 = Falso" . "\n"; 
}

if($A > $C){
    echo "b) A es mayor que C = Verdadero" . "\n";
}else{
    echo "b) A es mayor que C = Falso" . "\n"; 
}

if($A < $C + $B){
    echo "c) A es menor que C más B = Verdadero" . "\n";
}else{
    echo "c) A es menor que C más B = Falso" . "\n"; 
}

if($A * $B == 15){
    echo "d) El producto de A y B es 15 = Verdadero" . "\n";
}else{
    echo "d) El producto de A y B es 15 = Falso" . "\n"; 
}

if($A+$B == 8 && $A-$B == 4){
    echo "e) La suma A+B es 8 y la resta A-B es 4 = Verdadero" . "\n";
}else{
    echo "e) La suma A+B es 8 y la resta A-B es 4 = Falso" . "\n"; 
}

if($A > 3 && $B > 0 && $C > 3){
    echo "f) A es mayor que 3, b es mayor que 0 y c es mayor que 3 = Verdadero" . "\n";
}else{
    echo "f) A es mayor que 3, b es mayor que 0 y c es mayor que 3 = Falso" . "\n"; 
}

if(($C/$B) < ($A*$C)){
    echo "g) C dividido entre B es menor que (A*C)  = Verdadero" . "\n";
}else{
    echo "g) C dividido entre B es menor que (A*C)  = Falso" . "\n"; 
}

echo"</pre>>";
?>