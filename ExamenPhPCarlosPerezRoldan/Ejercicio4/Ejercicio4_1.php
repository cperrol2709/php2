<?php
session_start(); // Iniciamos la sesion

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['num_entradas'] = $_POST['num_entradas']; // Guardamos el numero de entradas en la sesión
    header("Location: Ejercicio4_2.php"); // Redirigimos a la pagina 2
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Por favor , ingresa el numero de entradas</title>
</head>
<body>
    <h1>POr favor , ingresa el numero de personas(1-10)</h1>
    <form method="POST" action="">
        <input type="number" name="num_entradas" min="1" max="10" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
