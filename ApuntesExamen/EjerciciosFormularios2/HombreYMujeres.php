Escriba un programa que permita introducir nombres de personas y su sexo y compruebe cuántas se han escrito.. El programa constará de tres páginas:

En la primera página se solicita el número de cajas de texto y botones radio (0 < número ≤ 10).

<!-- pagina1.php -->
<?php
session_start(); // Iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['num_entradas'] = $_POST['num_entradas']; // Guardamos el número de entradas en la sesión
    header("Location: HombreYMujeres2.php"); // Redirigimos a la página 2
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Número de Entradas</title>
</head>
<body>
    <h1>Ingrese el número de personas (1-10)</h1>
    <form method="POST" action="">
        <input type="number" name="num_entradas" min="1" max="10" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
