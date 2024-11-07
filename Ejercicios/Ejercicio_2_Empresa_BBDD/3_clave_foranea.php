<?php
try {
    $mysql = "mysql:host=172.26.104.220;dbname=ejercicio01;charset=UTF8";
    $user = "pepito01";
    $password = "pepito01";
    $conexion = new PDO($mysql, $user, $password);
    echo "<p>Conectado a la BBDD</p>";
} catch (PDOException $e) {
    // Mostramos mensaje en caso de error
    echo "<p>" . $e->getMessage() . "</p>";
}

$consulta9 = $conexion->prepare("ALTER TABLE `departamentos`
ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`);");

$consulta10 = $conexion->prepare("ALTER TABLE `empleados`
ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`);");

$consulta9->execute();
$consulta10->execute();
$conexion = null;
