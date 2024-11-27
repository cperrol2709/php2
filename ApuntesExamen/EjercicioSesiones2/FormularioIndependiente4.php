<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escribir sus apellidos</title>
</head>
<body>
    <h1>Escriba sus apellidos</h1>
    <?php
    if (isset($_SESSION['apellidos'])) {
        echo "<p>Ya ha escrito sus apellidos: " . htmlspecialchars($_SESSION['apellidos']) . "</p>";
    }
    ?>
    <form action="FormularioIndependiente5.php" method="post">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
