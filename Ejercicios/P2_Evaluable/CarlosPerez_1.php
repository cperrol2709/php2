Simula un lanzamiento de 6 dados y muestra en pantalla:
• Resultado obtenido de cada dado.
• Indicar cuántos dados han salido par y cuántos impar.
• Indicar el valor máximo y mínimo obtenido.
• Mostrar cuántas veces ha salido cada número, ordenado de menor a
mayor.
• Mostrar la suma de todos los dados.

<?php
echo "<pre>";

//Creamos 6 varibles de dados con un rand para que tengan un valor de 1 a 6
$dado1 =  rand(1, 6);
$dado2 =  rand(1, 6);
$dado3 =  rand(1, 6);
$dado4 =  rand(1, 6);
$dado5 =  rand(1, 6);
$dado6 =  rand(1, 6);

//Los añadimos a un array
$array = [$dado1,$dado2,$dado3,$dado4,$dado5,$dado6];

//Creamos dos variables , par e impar
$par = 0;
$impar = 0;

//Mostramos el valor de cada dado con una imagen de cada cara de dado con una altura y anchura de 150 px
echo "Resultado obtenido de cada dado.\n";
echo "<img src='imagenes/dado$dado1.png' alt='Dado $dado1' width='150' height='150'>";
echo "<img src='imagenes/dado$dado2.png' alt='Dado $dado2' width='150' height='150'>";
echo "<img src='imagenes/dado$dado3.png' alt='Dado $dado3' width='150' height='150'>";
echo "<img src='imagenes/dado$dado4.png' alt='Dado $dado4' width='150' height='150'>";
echo "<img src='imagenes/dado$dado5.png' alt='Dado $dado5' width='150' height='150'>";
echo "<img src='imagenes/dado$dado6.png' alt='Dado $dado6' width='150' height='150'>";  

echo "<br>";//Espacio

//Creamos un foreach para que recorra el array y saque de cada dado si es par o impar
foreach($array as $dado){
    if($dado % 2 == 0){
        $par++;
    }else{
        $impar++;
    }
}

//Mostramos los pares y impares
echo "Indicar cuántos dados han salido par y cuántos impar.\n";
echo "El numero de dados par es de : $par \n";
echo "El numero de dados impar es de : $impar \n";

echo "<br>";//Espacio

//Creamos una varible con el max del array y el minimo
$max = max($array);
$min = min($array);

//Mostramos el maximo y el minimo
echo "Indicar el valor máximo y mínimo obtenido.\n";
echo "El maximo es : $max \n";
echo "El minimo es : $min \n";

echo "<br>";//Espacio

//Creamos una varible por cara del dado para saber cuantas veces han salido
$uno = 0;
$dos = 0;
$tres = 0;
$cuatro = 0;
$cinco = 0;
$seis = 0;

//Con un foreach que recorre el array sacamos el numero de veces que ha salido cada numero
foreach($array as $dado){
    if($dado == 1){
        $uno++;
    }elseif($dado == 2){
        $dos++;
    }elseif($dado == 3){
        $tres++;
    }elseif($dado == 4){
        $cuatro++;
    }elseif($dado == 5){
        $cinco++;
    }else{
        $seis++;
    }
}

//Los añadimos a un array nuevo para luego ordenar
$ordenar = [1 => $uno,2 => $dos,3 => $tres,4 => $cuatro,5 => $cinco,6 => $seis];

//Ordenamos el array
asort($ordenar);

//Mostramos el array ordenado de menor a mayor
echo "Mostrar cuántas veces ha salido cada número, ordenado de menor a mayor.\n";
foreach ($ordenar as $numero => $veces) {
    echo "Número $numero salió $veces veces \n";
}

echo "<br>";//Espacio

//Creamos suma para calcular la suma de todos los dados
$suma = $dado1 + $dado2 + $dado3 + $dado4 + $dado5 + $dado6; 

//Mostramos la suma
echo "Mostrar la suma de todos los dados.\n";
echo "La suma total es de : $suma";
echo "</pre>";
?>