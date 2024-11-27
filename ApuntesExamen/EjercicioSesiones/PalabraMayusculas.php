Modifique el programa anterior de manera que:

El programa detecte si se ha escrito o no una única palabra en mayúsculas
La primera página muestre mensajes de error, cuando la segunda página detecte un error.
La primera página incluya en el control el valor incorrecto escrito por el usuario, cuando la segunda página detecte un error.

<!-- pagina1.php -->
<?php
session_start();

// Recuperar mensaje de error y texto anterior desde la sesión
$mensaje_error = isset($_SESSION['mensaje_error']) ? $_SESSION['mensaje_error'] : "";
$texto_anterior = isset($_SESSION['texto_anterior']) ? $_SESSION['texto_anterior'] : "";

// Limpiar mensajes de error después de mostrarlos
unset($_SESSION['mensaje_error']);
unset($_SESSION['texto_anterior']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Palabra en Mayúsculas</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>FORMULARIO PALABRA EN MAYÚSCULAS (FORMULARIO)</h1>

    <!-- Mostrar mensaje de éxito si no hay errores -->
    <?php if (isset($_SESSION['mensaje_exito'])): ?>
        <p><?php echo $_SESSION['mensaje_exito']; ?></p>
        <?php unset($_SESSION['mensaje_exito']); ?>
    <?php endif; ?>

    <form method="POST" action="PalabraMayusculas2.php">
        <label for="texto">Escriba una palabra en mayúsculas:</label><br>
        <input type="text" id="texto" name="texto" value="<?php echo htmlspecialchars($texto_anterior); ?>" required><br><br>
        <button type="submit">Comprobar</button>
        <button type="reset" onclick="window.location.href='PalabraMayusculas2.php'">Borrar</button>
    </form>

    <!-- Mostrar mensaje de error si lo hay -->
    <?php if (!empty($mensaje_error)): ?>
        <p class="error"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>
</body>
</html>

