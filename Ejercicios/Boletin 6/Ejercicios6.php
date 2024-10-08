Ejercicio 1
Crear una función en PHP que reciba como parámetros la altura (h) de un cilindro y
el radio de la base (r), y que nos devuelva el volumen del cilindro. La fórmula del
volume es: V=pi * r2 * h

<<?php

echo "<pre>";

// Función que calcula el volumen de un cilindro
function volumenCilindro($altura, $radio) {
    
    // Usamos 3.1415 como aproximación de pi y elevamos el radio al cuadrado.
    $volumen = $altura * 3.1415 * ($radio * $radio);
    
    // Devolvemos el volumen calculado
    return $volumen;
}

// Mostramos el volumen del cilindro con altura 20 y radio 5, redondeado a 2 decimales
echo "El volumen del cilindro es: " . number_format(volumenCilindro(20, 5), 2);

echo "</pre>";  
?>

Ejercicio 2
Crea 2 funciones PHP que, dado 3 números, una funcíon te los sume y la otra haga el
producto de los 3 números.

<?php

echo "<pre>";  

// Función que suma 3 números
function sumarNumeros($numero1, $numero2, $numero3) {

    // Sumamos los tres números recibidos como parámetros
    $sum = $numero1 + $numero2 + $numero3;
    
    // Devolvemos el resultado de la suma
    return $sum;
}

// Función que multiplica 3 números
function productoNumeros($numero1, $numero2, $numero3) {

    // Multiplicamos los tres números recibidos como parámetros
    $prod = $numero1 * $numero2 * $numero3;
    
    // Devolvemos el resultado del producto
    return $prod;
}

// Mostramos el resultado de la funcion sumarNumeros
echo "La suma de los números es: " . sumarNumeros(3, 4, 3) . "\n";

// Mostramos el resultado de la funcion productoNumeros
echo "El producto de los números es: " . productoNumeros(3, 3, 3);

echo "</pre>";  
?>