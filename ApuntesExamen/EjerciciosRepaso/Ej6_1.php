    Ejercicio 6:
    Escribe un programa de dos páginas que solicite un texto al usuario y lo muestre en las dos páginas.
    • En la primera página, se solicita un texto del usuario.

    <?php
// Iniciar la sesión con el nombre "ej6"
session_name("ej6");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Texto 1</title>
</head>

<body>
    <h1>FORMULARIO TEXTO 1</h1>
    <form action="Ej6_2.php" method="post">
        <!-- Campo para escribir texto, se llena con el valor guardado en la sesión si existe -->
        Escriba texto:
        <input type="text" name="texto" value="<?= htmlspecialchars($_SESSION['nombre'] ?? '') ?>">

        <p>
            <!-- Botón para enviar el formulario -->
            <input type="submit" value="Siguiente" style="border-radius: 4px;">
            <!-- Botón para borrar el texto -->
            <input type="reset" value="Borrar" style="border-radius: 4px;">
        </p>
    </form>

    <!-- Mostrar el último texto escrito, solo si existe un valor en la sesión -->
    <?php if (!empty($_SESSION['nombre'])): ?>
        <p>El último texto es: <strong><?= htmlspecialchars($_SESSION['nombre']) ?></strong>.</p>
    <?php endif; ?>
</body>

</html>
