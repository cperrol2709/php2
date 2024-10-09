EJERCICIO 3
Crea el código PHP donde se simule el lanzamiento de un dado. Repetir los lanzamientos
mostrando el número que sale hasta que salga un 6. En ese momento, mostrar un mensaje
informando que el proceso se acaba porque ha salido un 6.
Opcional: Incluid un contador que indique el número de tiradas que se han necesitado para
alcanzar el 6

<?php
echo "<pre>>";

$contador = 0;//Declaramos un contador en cero

//Creamos un do while 
do {
    $dado = rand(1, 6);//Creamos variable que genere un numero aleatorio entre el 1 y el 6
    print_r($dado . "\n");//Lo mostramos
    $contador++;//Incrementamos el contador
} while ($dado != 6);//La condicion para que el bucle se repita hasta que el numero aleatorio salga 6

print_r("Ya salio el 6 , el numero de intentos ha sido $contador");//Mostramos el numero de intentos

echo "</pre>>";
?>