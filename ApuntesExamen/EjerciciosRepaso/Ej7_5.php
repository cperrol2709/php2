• La quinta página muestra el nombre y los apellidos introducidos.

<?php
session_name("ej7");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Resultado</title>
</head>

<body>
    <h1>Resultado</h1>
    <p>Nombre: <strong><?= htmlspecialchars($_SESSION['nombre']) ?></strong></p>
    <p>Apellidos: <strong><?= htmlspecialchars($_SESSION['apellidos']) ?></strong></p>
    <p><a href="Ej7_1.php">Volver al inicio</a></p>
</body>

</html>
