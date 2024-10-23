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

//Creamos un array por cada linea , y dentro de cada linea , toda la informacion necesaria , con un array de paradas 
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

$km1 = $Linea1["longitud_linea"];
$km2 = $Linea2["longitud_linea"];
$km3 = $Linea3["longitud_linea"];

$km_totales = $km1 + $km2 + $km3;

echo "----------------------------------------------- \n";
echo "Los kilometros totales son : $km_totales \n";
echo "----------------------------------------------- \n";

//3. Del total de líneas de metro consideradas, contar el número total de paradas y el número de paradas que tienen transbordo. (1,5 puntos)

$lineas = [$Linea1, $Linea2, $Linea3];

$totalParadas = 0;
$totalTransbordos = 0;

foreach ($lineas as $linea) {
    $totalParadas = $totalParadas + count($linea) - 2; // Restamos 2 para excluir longitud_linea y maximo_numero_trenes
    foreach ($linea as $parada) {
        if (is_array($parada) && $parada['Transbordo']) {
            $totalTransbordos++;
        }
    }
}

echo "Número total de paradas: $totalParadas\n";
echo "Número de paradas con transbordo: $totalTransbordos\n";
echo "----------------------------------------------- \n";

//4. Nombrar las paradas con transbordo. (1 punto)

foreach ($lineas as $linea) {
    foreach ($linea as $parada) {
        if (is_array($parada) && $parada['Transbordo']) {
            $paradasConTransbordo[] = $parada['Nombre']; // Agregar el nombre al arreglo
        }
    }
}

print_r($paradasConTransbordo);

echo "</pre>";
?>