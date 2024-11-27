<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver su nombre y apellidos</title>
</head>
<body>
    <h1>Datos almacenados</h1>
    <?php
    if (isset($_SESSION['nombre']) || isset($_SESSION['apellidos'])) {
        echo "<p>Nombre: " . htmlspecialchars($_SESSION['nombre'] ?? "No especificado") . "</p>";
        echo "<p>Apellidos: " . htmlspecialchars($_SESSION['apellidos'] ?? "No especificado") . "</p>";
    } else {
        echo "<p>No se han almacenado datos.</p>";
    }
    ?>
    <a href="FormularioIndependiente.html">Volver al inicio</a>
</body>
</html>
