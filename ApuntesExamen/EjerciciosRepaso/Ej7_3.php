• En la tercera página se solicitan los apellidos del usuario.

<?php
session_name("ej7");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Apellidos</title>
</head>

<body>
    <h1>Formulario: Apellidos</h1>
    <form action="Ej7_4.php" method="post">
        <!-- Campo para escribir los apellidos -->
        Apellidos: <input type="text" name="apellidos" value="<?= htmlspecialchars($_SESSION['apellidos'] ?? '') ?>">
        <p>
            <input type="submit" value="Siguiente">
        </p>
    </form>
</body>

</html>
