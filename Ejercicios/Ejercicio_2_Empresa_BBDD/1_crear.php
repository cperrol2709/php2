<?php
try
{
$mysql ="mysql:host=172.26.104.220;dbname=ejercicio01;charset=UTF8";
$user = "pepito01";
$password = "pepito01";
$conexion = new PDO($mysql, $user, $password);
echo "<p>Conectado a la BBDD</p>";
}
catch (PDOException $e)
{
// Mostramos mensaje en caso de error
echo "<p>" .$e->getMessage()."</p>";
}

$consulta1 = $conexion->prepare("CREATE TABLE `departamentos` (
     `id` int(11) NOT NULL,
     `nombre` varchar(100) NOT NULL,
     `presupuesto` int(11) NOT NULL,
     `sede_id` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
$consulta2 = $conexion->prepare("CREATE TABLE `empleados` (
     `id` int(11) NOT NULL,
     `nombre` varchar(50) NOT NULL,
     `email` varchar(120) NOT NULL,
     `apellidos` varchar(150) NOT NULL,
     `salario` float NOT NULL,
     `hijos` int(11) NOT NULL,
     `departamento_id` int(11) NOT NULL,
     `pais_id` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$consulta3 = $conexion->prepare("CREATE TABLE `paises` (
     `id` int(11) NOT NULL,
     `nacionalidad` varchar(50) NOT NULL,
     `pais` varchar(50) NOT NULL
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    
    $consulta4 = $conexion->prepare("CREATE TABLE `sedes` (
     `id` int(11) NOT NULL,
     `nombre` varchar(50) NOT NULL,
     `direccion` varchar(255) NOT NULL
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
$consulta1->execute();
$consulta2->execute();
$consulta3->execute();
$consulta4->execute();
$conexion = null;
?>