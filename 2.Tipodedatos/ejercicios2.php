/*EJERCICIO 1:
Escribir el código con una lista de 3 productos y que, de cada producto, aparezca el producto,
el precio sin IVA, el importe del IVA (aplicad el 21%) y el precio total.
Los precios sin IVA serán: 22.50, 29.90 y 18.30 (expresado en EUR)*/

<?php
echo"<pre>>";
// Definimos los productos y sus precios sin IVA en una lista
$productos = [
    ["nombre" => "Producto 1", "precio_sin_iva" => 22.50],
    ["nombre" => "Producto 2", "precio_sin_iva" => 29.90],
    ["nombre" => "Producto 3", "precio_sin_iva" => 18.30],
];

// Definimos la tasa de IVA
$iva_porcentaje = 21;

// Mostramos los productos con sus precios y calculos
foreach ($productos as $producto) {
    $importe_iva = ($producto["precio_sin_iva"] * $iva_porcentaje) / 100;
    $precio_total = $producto["precio_sin_iva"] + $importe_iva;
    
    echo "Producto: " . $producto["nombre"] . "\n";
    echo "Precio sin IVA: " . $producto["precio_sin_iva"] . " EUR\n";
    echo "Importe IVA (21%): " . $importe_iva  . " EUR\n";
    echo "Precio total: " . $precio_total . " EUR\n";
    echo "----------------------------\n";
}
echo"</pre>>";
?>

/*EJERCICIO 2:
Modificar el ejercicio anterior redondeando los precios a 2 decimales.*/

<?php
echo"<pre>>";
// Definimos los productos y sus precios sin IVA
$productos = [
    ["nombre" => "Producto 1", "precio_sin_iva" => 22.50],
    ["nombre" => "Producto 2", "precio_sin_iva" => 29.90],
    ["nombre" => "Producto 3", "precio_sin_iva" => 18.30],
];

// Definimos la tasa de IVA
$iva_porcentaje = 21;

// Mostramos los productos con sus precios y calculos añadiendo number_format para redondearlo a 2 decimales
foreach ($productos as $producto) {
    $importe_iva = ($producto["precio_sin_iva"] * $iva_porcentaje) / 100;
    $precio_total = $producto["precio_sin_iva"] + $importe_iva;
    
    echo "Producto: " . $producto["nombre"] . "\n";
    echo "Precio sin IVA: " . number_format($producto["precio_sin_iva"], 2) . " EUR\n";
    echo "Importe IVA (21%): " . number_format($importe_iva, 2) . " EUR\n";
    echo "Precio total: " . number_format($precio_total, 2) . " EUR\n";
    echo "----------------------------\n";
}
echo"</pre>>";
?>


/*EJERCICIO 3:
Una persona compra 55 unidades del primer producto del ejercicio 2. Crear un código que nos
indique:
- Producto
- Cantidad comprada
- Precio unitario sin IVA
- Precio total sin IVA
- Importe total del IVA
- Importe total de la compra
Todos los importes llevarán separador de miles y 2 decimales.*/

<?php
echo"<pre>>";
// Definimos el primer producto y su precio sin IVA
$producto = [
    "nombre" => "Producto 1",
    "precio_sin_iva" => 22.50
];

// Definimos la cantidad comprada
$cantidad_comprada = 55;

// Definimos la tasa de IVA
$iva_porcentaje = 21;

// Calculamos el precio total sin IVA
$precio_total_sin_iva = $producto["precio_sin_iva"] * $cantidad_comprada;

// Calculamos el importe total del IVA
$importe_total_iva = ($precio_total_sin_iva * $iva_porcentaje) / 100;

// Calculamos el importe total de la compra
$importe_total_compra = $precio_total_sin_iva + $importe_total_iva;

// Mostramos los resultados
echo "Producto: " . $producto["nombre"] . "\n";
echo "Cantidad comprada: " . number_format($cantidad_comprada) . "\n";
echo "Precio unitario sin IVA: " . number_format($producto["precio_sin_iva"], 2, ',', '.') . " EUR\n";
echo "Precio total sin IVA: " . number_format($precio_total_sin_iva, 2, ',', '.') . " EUR\n";
echo "Importe total del IVA (21%): " . number_format($importe_total_iva, 2, ',', '.') . " EUR\n";
echo "Importe total de la compra: " . number_format($importe_total_compra, 2, ',', '.') . " EUR\n";
echo"</pre>>";
?>

/*EJERCICIO 4:
En el ejercicio anterior, si el total del precio de la venta es superior a 1,500.00€, aplicar un 5%
de descuento, detallando el total descontado y el precio final con descuento.

<?php
echo"<pre>>";
// Definimos el primer producto y su precio sin IVA
$producto = [
    "nombre" => "Producto 1",
    "precio_sin_iva" => 24.50
];

// Definimos la cantidad comprada
$cantidad_comprada = 55;

// Definimos la tasa de IVA
$iva_porcentaje = 21;

// Calculamos el precio total sin IVA
$precio_total_sin_iva = $producto["precio_sin_iva"] * $cantidad_comprada;

// Calculamos el importe total del IVA
$importe_total_iva = ($precio_total_sin_iva * $iva_porcentaje) / 100;

// Calculamos el importe total de la compra
$importe_total_compra = $precio_total_sin_iva + $importe_total_iva;



// Mostramos los resultados
echo "Producto: " . $producto["nombre"] . "\n";
echo "Cantidad comprada: " . number_format($cantidad_comprada) . "\n";
echo "Precio unitario sin IVA: " . number_format($producto["precio_sin_iva"], 2, ',', '.') . " EUR\n";
echo "Precio total sin IVA: " . number_format($precio_total_sin_iva, 2, ',', '.') . " EUR\n";
echo "Importe total del IVA (21%): " . number_format($importe_total_iva, 2, ',', '.') . " EUR\n";
if($importe_total_compra > 1500){
    $importe_retirado = $importe_total_compra * 0.05;
    $precio_final = $importe_total_compra - $importe_retirado;
    echo "Importe total de la compra: " . number_format($importe_total_compra, 2, ',', '.') . " EUR\n"; 
    echo "Importe retirado: " . number_format($importe_retirado, 2, ',', '.') . " EUR\n";
    echo "Importe final total de la compra: " . number_format($precio_final, 2, ',', '.') . " EUR\n";
}else{
    echo "Importe total de la compra: " . number_format($importe_total_compra, 2, ',', '.') . " EUR\n";
}

echo"</pre>>";
?>

EJERCICIO 5
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
g) C dividido entre B es menor que (A*C)*/

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

if($A * $B = 15){
    echo "d) El producto de A y B es 15 = Verdadero" . "\n";
}else{
    echo "d) El producto de A y B es 15 = Falso" . "\n"; 
}

if($A+$B = 8 && $A-$B = 4){
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