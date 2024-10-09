EJERCICIO 5
Crear un código para el cálculo de las siguientes tablas de multiplicar:
- Tabla del 3 usando el bucle FOR
- Tabla del 4 usando el bucle WHILE
- Tabla del 7 usando el bucle DO…WHILE

<?php
echo "<pre>>";

print("Tabla del 3 con el for: \n");

//Bucle for que va desde el 1 hasta el 10 
for($i = 1 ; $i <= 10 ; $i++){
    $mult = 3 * $i;//añadimos en una variable mult la multiplicacion del tres por el contador de i
    print("3 x $i = $mult \n");//Vamos mostrando el resultado
}

print("-------------- \n");

print("Tabla del 4 con el while: \n");
$contador = 1;//Creamos un contador
while($contador <= 10){//Ponemos la condicion
    $mult = 4 * $contador;//añadimos en una variable mult la multiplicacion del cuatro por el contador
    print("4 x $contador = $mult \n");//Lo mostramos
    $contador++;//Incrementamos el contador

}

print("-------------- \n");

print("Tabla del 7 con el do while: \n");
$contador = 1;//Creamos un contador
do{
    $mult = 7 * $contador;//añadimos en una variable mult la multiplicacion del siete por el contador
    print("7 x $contador = $mult \n");//Lo mostramos
    $contador++;//Incrementamos el contador
}while($contador <= 10);//Ponemos la condicion

echo "</pre>>";
?>