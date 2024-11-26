Ejercicio 7:
Escribe dos formularios encadenados que soliciten el nombre y los apellidos del usuario.
• En la primera página, se solicita el nombre del usuario.

<?php
session_name("ej7");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Nombre</title>
</head>

<body>
    <h1>Formulario: Nombre</h1>
    <form action="Ej7_2.php" method="post">
        <!-- Campo para escribir el nombre -->
        Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($_SESSION['nombre'] ?? '') ?>">
        <p>
            <input type="submit" value="Siguiente">
        </p>
    </form>
</body>

</html>
