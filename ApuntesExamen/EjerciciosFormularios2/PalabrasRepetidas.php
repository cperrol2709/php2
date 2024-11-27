Escriba un programa que permita introducir palabras y que compruebe si están o no repetidas. El programa constará de tres páginas:

En la primera página se solicita el número de cajas de texto (0 < número ≤ 10).

<?php
// Página 1: Solicitar el número de cajas de texto
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar número de cajas</title>
</head>
<body>
    <h1>Introducir número de cajas</h1>
    <form action="PalabrasRepetidas2.php" method="POST">
        <label for="num_cajas">Número de cajas de texto (1-10):</label>
        <input type="number" name="num_cajas" id="num_cajas" min="1" max="10" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

