Ejercicio 2 – Líneas de Metro (7 puntos)
Crear una estructura de datos para guardar información de, al menos, 3 líneas de metro
de una ciudad. Podéis tomar como ejemplo, Madrid (www.metromadrid.es ). Por cada
línea de metro se debe guardar(1):
• Longitud de la línea en kilómetros.
• Máximo número de trenes soportados por la línea.
• Información de las paradas de esa línea. Por cada parada tenemos que
tener:
◦ Su nombre.
◦ Número de personas que se han subido en esa parada un día.
◦ Número de personas que se han bajado en esa parada en un día.
◦ Si desde esa parada se puede hacer transbordo con otra línea.

Nota 1: Podéis inventaros los datos (longitud, viajeros, número de trenes) si no los
encontráis. No es necesario poner todas las paradas de cada línea. Basta la inicial, final y
3 intermedias.

Una vez generada la estructura:
1. Mostrar los arrays generados por cada línea de metro. (1 punto)
2. Calcula los kilómetros totales de las líneas consideradas. (1,5 puntos)
3. Del total de líneas de metro consideradas, contar el número total de paradas y el
número de paradas que tienen transbordo. (1,5 puntos)
4. Nombrar las paradas con transbordo. (1 punto)
5. A partir de una línea de metro al azar, indicar qué línea ha sido la obtenida al azar y
obtener un array solo con los nombres de las paradas de esa línea y el número
total de viajeros que han hecho uso de cada parada (subido o bajado). (1,5 puntos)
6. Ordenar el array anterior por números de pasajeros. (0,5puntos)

<?php
echo "<pre>";

//Creamos un array por cada linea , y dentro de cada linea , toda la informacion necesaria , con un array con toda la informacion por cada parada
$Linea1 = [
    "longitud_linea" => 100,
    "maximo_numero_trenes" => 5,
    "Parada1" => ["Nombre" => "Plaza Central", "NumPersonasSubido" => 10, "NumPersonasBajado" => 5, "Transbordo" => true],
    "Parada2" => ["Nombre" => "Avenida Libertad", "NumPersonasSubido" => 8, "NumPersonasBajado" => 12, "Transbordo" => true],
    "Parada3" => ["Nombre" => "Estación Central", "NumPersonasSubido" => 15, "NumPersonasBajado" => 20, "Transbordo" => true],
    "Parada4" => ["Nombre" => "Calle Mayor", "NumPersonasSubido" => 5, "NumPersonasBajado" => 3, "Transbordo" => true],
    "Parada5" => ["Nombre" => "Barrio Antiguo", "NumPersonasSubido" => 12, "NumPersonasBajado" => 6, "Transbordo" => true],
];

$Linea2 = [
    "longitud_linea" => 102,
    "maximo_numero_trenes" => 6,
    "Parada1" => ["Nombre" => "Parque de la Ciudad", "NumPersonasSubido" => 20, "NumPersonasBajado" => 10, "Transbordo" => true],
    "Parada2" => ["Nombre" => "Plaza de Toros", "NumPersonasSubido" => 15, "NumPersonasBajado" => 5, "Transbordo" => false],
    "Parada3" => ["Nombre" => "Museo de Arte", "NumPersonasSubido" => 30, "NumPersonasBajado" => 25, "Transbordo" => true],
    "Parada4" => ["Nombre" => "Catedral Vieja", "NumPersonasSubido" => 10, "NumPersonasBajado" => 12, "Transbordo" => false],
    "Parada5" => ["Nombre" => "Terminal de Autobuses", "NumPersonasSubido" => 8, "NumPersonasBajado" => 18, "Transbordo" => true],
];

$Linea3 = [
    "longitud_linea" => 88,
    "maximo_numero_trenes" => 7,
    "Parada1" => ["Nombre" => "Plaza de la Libertad", "NumPersonasSubido" => 18, "NumPersonasBajado" => 9, "Transbordo" => true],
    "Parada2" => ["Nombre" => "Centro Comercial", "NumPersonasSubido" => 25, "NumPersonasBajado" => 15, "Transbordo" => false],
    "Parada3" => ["Nombre" => "Estadio Municipal", "NumPersonasSubido" => 22, "NumPersonasBajado" => 20, "Transbordo" => true],
    "Parada4" => ["Nombre" => "Jardín Botánico", "NumPersonasSubido" => 12, "NumPersonasBajado" => 6, "Transbordo" => false],
    "Parada5" => ["Nombre" => "Calle de la Cultura", "NumPersonasSubido" => 30, "NumPersonasBajado" => 25, "Transbordo" => true],
];

//1. Mostrar los arrays generados por cada línea de metro. (1 punto)

//Mostramos cada linea de metro con un print_r para que muestre el array
echo "----------------------------------------------- \n";
echo "Linea 1 \n";
echo "----------------------------------------------- \n";
print_r($Linea1);

echo "<br>";

echo "----------------------------------------------- \n";
echo "Linea 2 \n";
echo "----------------------------------------------- \n";
print_r($Linea2);

echo "<br>";

echo "----------------------------------------------- \n";
echo "Linea 3 \n";
echo "----------------------------------------------- \n";
print_r($Linea3);

echo "<br>";

//2. Calcula los kilómetros totales de las líneas consideradas. (1,5 puntos)

//Creamos una variable y le asignamos la longitud de cada linea 
$km1 = $Linea1["longitud_linea"];
$km2 = $Linea2["longitud_linea"];
$km3 = $Linea3["longitud_linea"];

//Creamos una variable para sumar las longitudes
$km_totales = $km1 + $km2 + $km3;

//Mostramos el resultado
echo "----------------------------------------------- \n";
echo "Los kilometros totales son : $km_totales \n";
echo "----------------------------------------------- \n";

//3. Del total de líneas de metro consideradas, contar el número total de paradas y el número de paradas que tienen transbordo. (1,5 puntos)

//Creamos un array con todas las lineas
$lineas = [$Linea1, $Linea2, $Linea3];

//Creamos una variable de totalParadas y totalTransbordos
$totalParadas = 0;
$totalTransbordos = 0;

//Creamos un array para acceder a cada una de las lineas
foreach ($lineas as $linea) {
    $totalParadas = $totalParadas + count($linea) - 2; // Restamos 2 para excluir longitud_linea y maximo_numero_trenes
    foreach ($linea as $parada) {//Dentro de cada linea accedemos a cada parada
        if (is_array($parada) && $parada['Transbordo']) {//Comprobamos que existe Transbordo
            $totalTransbordos++;//Sumamos si es true a la variable totalTransbordos
        }
    }
}

//Mostramos el resultado
echo "Número total de paradas: $totalParadas\n";
echo "Número de paradas con transbordo: $totalTransbordos\n";
echo "----------------------------------------------- \n";

//4. Nombrar las paradas con transbordo. (1 punto)

//Creamos un array para acceder a cada una de las lineas
foreach ($lineas as $linea) {
    foreach ($linea as $parada) {//Dentro de cada linea accedemos a cada parada
        if (is_array($parada) && $parada['Transbordo']) {//Comprobamos que existe Transbordo
            $paradasConTransbordo[] = $parada['Nombre']; // Creamos un array vacio y vamos añadiendo el nombre de cada parada
        }
    }
}

//Mostramos el resultado
print_r($paradasConTransbordo);

echo "----------------------------------------------- \n";

//5. A partir de una línea de metro al azar, indicar qué línea ha sido la obtenida al azar y obtener un array solo con los nombres de las paradas de esa línea y el número total de viajeros que han hecho uso de cada parada (subido o bajado). (1,5 puntos)

$indiceAleatorio = array_rand($lineas);
$lineaAleatoria = $lineas[$indiceAleatorio];

// Creamos un array con los nombres de las paradas y el número total de viajeros
$paradasViajeros = [];

foreach ($lineaAleatoria as $parada) {
    if (is_array($parada)) {// Comprobamos que el elemento actual es un array (una parada)
        $nombre = $parada['Nombre']; // Extraemos el nombre de la parada
        $totalViajeros = $parada['NumPersonasSubido'] + $parada['NumPersonasBajado'];// Calculamos el total de viajeros sumando las personas que subieron y las que bajaron
        $paradasViajeros[$nombre] = $totalViajeros;// Almacenamos el nombre de la parada y el total de viajeros en el array de resultados
    }
}

// Mostrar el resultado
print_r($paradasViajeros);

echo "----------------------------------------------- \n";

//6. Ordenar el array anterior por números de pasajeros. (0,5puntos)

arsort($paradasViajeros); // Ordenamos el array por el número de pasajeros con arsort

// Mostramos el array ordenado
echo "Paradas ordenadas por número de pasajeros:\n";
print_r($paradasViajeros);

echo "</pre>";
?>