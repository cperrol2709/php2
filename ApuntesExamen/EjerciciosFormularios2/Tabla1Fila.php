Escriba un programa que muestre una tabla de una fila con casillas de verificación en cada celda y cuente las casillas marcadas. El programa constará de tres páginas:

En la primera página se solicita el tamaño de la tabla.

<!-- Tabla1Fila.php -->
<?php
session_start(); // Iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tamano = $_POST['tamano'];
    
    // Validar que el tamaño esté dentro del rango permitido (1 a 20)
    if ($tamano > 0 && $tamano <= 20) {
        $_SESSION['tamano'] = $tamano;
        header("Location: Tabla1Fila2.php"); // Redirigir a la página Tabla1Fila2
        exit();
    } else {
        $error = "El tamaño de la tabla debe ser entre 1 y 20 casillas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de una fila con casillas de verificación</title>
</head>
<body>
    <h1>TABLA DE UNA FILA CON CASILLAS DE VERIFICACIÓN (FORMULARIO)</h1>
    <p>Escriba un número (0 < número ≤ 20) y mostraré una tabla de una fila con ese tamaño con casillas de verificación en cada celda.</p>
    
    <form method="POST" action="">
        <label for="tamano">Tamaño de la tabla:</label>
        <input type="number" id="tamano" name="tamano" min="1" max="20" required><br><br>
        <button type="submit">Mostrar</button>
        <button type="reset">Borrar</button>
    </form>
    
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
