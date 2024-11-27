<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escribir su nombre</title>
</head>
<body>
    <h1>Escriba su nombre</h1>
    <?php
    if (isset($_SESSION['nombre'])) {
        echo "<p>Ya ha escrito su nombre: " . htmlspecialchars($_SESSION['nombre']) . "</p>";
    }
    ?>
    <form action="FormularioIndependiente5.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
