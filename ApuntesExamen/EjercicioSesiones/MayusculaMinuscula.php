Modifique el programa anterior de manera que haya dos controles:

En uno se deberá escribir una única palabra en mayúsculas.
En otro se deberá escribir una única palabra en minúsculas.

<?php
session_start();

// Recuperar mensajes de error y textos anteriores desde la sesión
$mensaje_error = isset($_SESSION['mensaje_error']) ? $_SESSION['mensaje_error'] : "";
$texto_mayus = isset($_SESSION['texto_mayus']) ? $_SESSION['texto_mayus'] : "";
$texto_minus = isset($_SESSION['texto_minus']) ? $_SESSION['texto_minus'] : "";

// Limpiar mensajes de error después de mostrarlos
unset($_SESSION['mensaje_error']);
unset($_SESSION['texto_mayus']);
unset($_SESSION['texto_minus']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Palabras Mayúsculas y Minúsculas</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>FORMULARIO PALABRAS MAYÚSCULAS Y MINÚSCULAS</h1>

    <!-- Mostrar mensaje de éxito si no hay errores -->
    <?php if (isset($_SESSION['mensaje_exito'])): ?>
        <p class="success"><?php echo $_SESSION['mensaje_exito']; ?></p>
        <?php unset($_SESSION['mensaje_exito']); ?>
    <?php endif; ?>

    <form method="POST" action="MayusculaMinuscula2.php">
        <label for="texto_mayus">Escriba una palabra en MAYÚSCULAS:</label><br>
        <input type="text" id="texto_mayus" name="texto_mayus" value="<?php echo htmlspecialchars($texto_mayus); ?>" required><br><br>

        <label for="texto_minus">Escriba una palabra en minúsculas:</label><br>
        <input type="text" id="texto_minus" name="texto_minus" value="<?php echo htmlspecialchars($texto_minus); ?>" required><br><br>

        <button type="submit">Comprobar</button>
        <button type="reset" onclick="window.location.href='MayusculaMinuscula.php'">Borrar</button>
    </form>

    <!-- Mostrar mensaje de error si lo hay -->
    <?php if (!empty($mensaje_error)): ?>
        <p class="error"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>
</body>
</html>
