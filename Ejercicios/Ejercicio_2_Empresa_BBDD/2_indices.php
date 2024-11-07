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

$consulta5 = $conexion->prepare("ALTER TABLE `departamentos`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `nombre` (`nombre`),
ADD KEY `centro` (`sede_id`),
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");

$consulta6 = $conexion->prepare("ALTER TABLE `empleados`
ADD PRIMARY KEY (`id`),
ADD KEY `departamento` (`departamento_id`),
ADD KEY `nacionalidad` (`pais_id`),
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");

$consulta7 = $conexion->prepare("ALTER TABLE `paises`
ADD PRIMARY KEY (`id`),
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");

$consulta8 = $conexion->prepare("ALTER TABLE `sedes`
ADD PRIMARY KEY (`id`),
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");

$consulta5->execute();
$consulta6->execute();
$consulta7->execute();
$consulta8->execute();

$conexion = null;
