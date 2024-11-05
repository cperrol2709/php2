1.Dado un url , se desea extraer los datos del protocolo , el nombre de dominio , la ruta de acceso u otro componente significativo

<?php
echo "<pre>";
$url = "https://www.marca.com";

// Usamos parse_url para obtener los componentes
$componentes = parse_url($url);

// Extraemos los componentes individuales
$protocolo = $componentes['scheme'] ?? "No especificado";
$dominio = $componentes['host'] ?? "No especificado";
$path = $componentes['path'] ?? "No especificado";
$query = $componentes['query'] ?? "No especificado";


echo "Protocolo: " . $protocolo . PHP_EOL;
echo "Dominio: " . $dominio . PHP_EOL;
echo "Ruta de acceso: " . $path . PHP_EOL;
echo "Query: " . $query . PHP_EOL;
echo "</pre>";
?>

2.Se desea encontrar el valor maximo y minimo de una serie de numeros desorndenados

<?php
echo "<pre>";
//Creamos la serie de numero
$series = array(76, 7348, 56, 2.6, 189, 67.59, 17594, 2648, 1929.79, 54, 329, 820, -1.10, -1.101);

//Creamos una variable max y min y cogemos el max y el minimo del array
$max = max($series);
$min = min($series);

echo "EL numero maximo es : $max \n";
echo "EL numero minimo es : $min \n";
echo "</pre>";
?>

3.Imprime la hora y fecha actual

<?php
echo "<pre>";

echo date("Y-m-d H:i:s");

echo "</pre>";
?>

4.Escribe una funcion que calcule si un año es bisiesto(Si es divisible por 4 y 400,pero no por 100).

<?php
echo "<pre>";

//Hacemos la funcion comprobando con el if si es divisible por 4 y no de 100 y tambien si es divible por 400
function bisiesto($año)
{
    if (($año % 4 == 0 && $año % 100 != 0) || ($año % 400 == 0)) {
        echo "Si es bisiesto \n";
    } else {
        echo "No es bisiesto \n";
    }
}

bisiesto(2000);
bisiesto(1900);
bisiesto(2024);

echo "</pre>";
?>

5.Escribe una funcion que indique los dias que tiene un mes.

<?php
echo "<pre>";

function diasEnMes($mes)
{
    // Comprobamos que el numero del mes este entre 1 y 12
    if ($mes < 1 || $mes > 12) {
        return "Mes inválido";
    }


    $diasPorMes = [
        1 => 31,
        2 => 28,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31
    ];

    return $diasPorMes[$mes];
}

// Ejemplos de uso
echo "Enero: " . diasEnMes(1) . " días \n";
echo "Febrero: " . diasEnMes(2) . " días \n";
echo "Abril: " . diasEnMes(4) . " días \n";
echo "Diciembre: " . diasEnMes(12) . " días \n";

echo "</pre>";
?>

6.Escribe una funcion que convierta un numero determinado de minutos al formato horas:minutos.Por ejemplo, 156 minutos seria 02:36

<?php
echo "<pre>";

//Formateamos con la funcion gmdate la cantidad de segundos a horas:minutos
function convertirMinutosAFormato($minutos)
{
    return gmdate("H:i", $minutos * 60 . " \n");
}

echo convertirMinutosAFormato(135);
echo "</pre>";
?>

7.Escribe una funcion para comparar dos fechas y ver cual es mas reciente

<?php
echo "<pre>";
function compararFechas($fecha1, $fecha2)
{

    $fechaObj1 = new DateTime($fecha1);
    $fechaObj2 = new DateTime($fecha2);

    // Comparamos las fechas
    if ($fechaObj1 > $fechaObj2) {
        return "$fecha1 es más reciente que $fecha2";
    } elseif ($fechaObj1 < $fechaObj2) {
        return "$fecha2 es más reciente que $fecha1";
    } else {
        return "Ambas fechas son iguales";
    }
}

echo compararFechas("2024-11-05", "2024-10-30");
echo "</pre>";
?>

8. Mostrar la tabla de multiplicar del 2. Emplear el for, luego el while y por ultimo el do/while.
<?php
echo "<pre>";

echo "For \n";

for ($i = 1; $i <= 10; $i++) {
    $mult = $i * 2;
    echo "$mult \n";
}

echo "While \n";

$i = 0;

while ($i != 10) {
    $i++;
    $mult = $i * 2;
    echo "$mult \n";
}

echo "Do While \n";

$e = 0;

do {
    $e++;
    $mult = $e * 2;
    echo "$mult \n";
} while ($e != 10);

echo "</pre>";
?>
9. Crea un array multidimensional llamado $personas con información de tres personas, cada una con nombre, edad, y ciudad.
Muestra los datos de cada persona en el siguiente formato: Nombre: Juan, Edad: 25, Ciudad: Madrid.
<?php
echo "<pre>";

$personas = [["Nombre" => "Carlos","Edad" => 20,"Ciudad" => "Huelva"],["Nombre" => "Pepe","Edad" => 19,"Ciudad" => "Sevilla"],["Nombre" => "Juan","Edad" => 25,"Ciudad" => "Barcelona"]];

foreach($personas as $persona){
    echo "Nombre: " . $persona['Nombre'] . ", Edad: " . $persona['Edad'] . ", Ciudad: " . $persona['Ciudad'] . " \n";
}

echo "</pre>";
?>
10. Crea un array multidimensional llamado $estudiantes que contenga los nombres de tres estudiantes y sus calificaciones en tres materias.
Calcula el promedio de calificaciones de cada estudiante y muestra el resultado en el siguiente formato: Estudiante: Juan, Promedio: 7.5.
<?php
echo "<pre>";

$estudiantes = [
    ["Nombre" => "Carlos", "Notas" => ["Nota1" => 5, "Nota2" => 7, "Nota3" => 5]],
    ["Nombre" => "Pepe", "Notas" => ["Nota1" => 3, "Nota2" => 5, "Nota3" => 1]],
    ["Nombre" => "Jose", "Notas" => ["Nota1" => 9, "Nota2" => 7, "Nota3" => 3]]
];

foreach ($estudiantes as $estudiante) {
    // Accedemos a las notas y calculamos el promedio
    $notas = $estudiante["Notas"];
    $suma = array_sum($notas);
    $promedio = $suma / count($notas);
    
    // Mostramos el nombre del estudiante y su promedio
    echo "Estudiante: " . $estudiante["Nombre"] . ", Promedio: " . number_format($promedio, 2) . "\n";
}

echo "</pre>";
?>
11. Crea un array multidimensional llamado $biblioteca que contenga información de tres libros, cada uno con titulo, autor, y año.
Muestra los detalles de cada libro en el siguiente formato: Título: 1984, Autor: George Orwell, Año: 1949.
<?php
echo "<pre>";

$biblioteca = [["Titulo" => "Las 3 pistolas","Autor" => "Lopez","Año" => 2003],["Titulo" => "El desenreo","Autor" => "Samuel","Año" => 2143],["Titulo" => "Caida libre","Autor" => "Pelko","Año" => 2023]];

foreach($biblioteca as $libros){
    echo "Titulo: " . $libros['Titulo'] . " , Autor:" . $libros['Autor'] . ", Año: " . $libros['Año'] . "\n"; 
}

echo "</pre>";
?>
12. Confeccionar un formulario que solicite la carga del nombre de una persona y que permita seleccionar una serie de deportes que practica (futbol, basket, tennis, voley). Mostrar en la pagina que procesa el formulario la cantidad de deportes que practica
<?php
echo "<pre>";

echo "</pre>";
?>