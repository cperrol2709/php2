EJERCICIO 4
Crea un código PHP donde se simule el lanzamiento de un dado 100 veces. Se debe mostrar:
- El número de tirada
- El valor de cada tirada
- La suma total de todas las tiradas
- La media aritmética de las tiradas con 2 decimales
- El número de veces que ha salido el 2.

<?php
echo "<pre>>";

$contador = 0;//Hacemos un contador para el numero de apariciones del 2
$suma = 0;//Variable suma para contar la suma de todos los numeros

//Bucle for desde el 1 hasta el 100 
for ($i = 1; $i <= 100; $i++) {
    $dado = rand(1, 6);//Generamos numero aleatorio entre el 1-6

    print("Tirada $i \n");//Imprimimos el numero de tirada
    print("El valor de la tirada $i es $dado \n");//Imprimimos el valor de la tirada

    $suma += $dado;//Vamos sumando los numeros del dado

    //Si el numero generado es dos se incrementa en 1 el contador
    if ($dado == 2) {
        $contador++;
    }
}

//Variable media para la calcular la media aritmetica
$media = $suma / 100;

//Imprimimos la suma , la media y el numero de veces que salio el 2
print("--------------------- \n");

print("La suma es de : $suma \n");
print("La media aritmetica es : " . number_format($media, 2) . "\n");
print("El numero de veces que salio el 2 es de : $contador");

echo "</pre>>";
?>