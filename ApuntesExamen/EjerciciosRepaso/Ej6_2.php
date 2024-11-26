En la segunda página, se dice si se ha escrito o no texto en el formulario. Se pueden escribir
letras o números, una o varias palabras.

<?php
// Iniciar la sesión con el nombre "ej6"
session_name("ej6");
session_start();

// Verificar si el formulario se envió mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tomar el texto enviado, eliminando espacios en blanco
    $texto = trim($_POST["texto"]);
    // Guardar el texto en la sesión
    $_SESSION["nombre"] = $texto;
} else {
    // Si no se envió texto, se inicializa vacío
    $texto = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Texto</title>
</head>

<body>
    <h1>FORMULARIO TEXTO 1 (RESULTADO)</h1>

    <!-- Verificar si se escribió texto o no, y mostrar el mensaje correspondiente -->
    <?php if (empty($texto)): ?>
        <p style="color: red;">No ha escrito texto.</p>
    <?php else: ?>
        <p>El texto es: <strong><?= htmlspecialchars($texto) ?></strong>.</p>
    <?php endif; ?>

    <!-- Enlace para regresar a la primera página -->
    <p>
        <a href="pagina1.php">Volver a la primera página.</a>
    </p>
</body>

</html>


