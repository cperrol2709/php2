Escriba un programa que muestre una tabla de una fila con casillas de verificación en cada celda y cuente las casillas marcadas. El programa constará de tres páginas:

En la primera página se solicita el tamaño de la tabla.

<!-- Tabla1Fila.php -->
<?php
session_start(); // Iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filas = $_POST['filas'];
    $columnas = $_POST['columnas'];
    
    // Validar que el tamaño esté dentro del rango permitido (1 a 20)
    if ($filas > 0 && $filas <= 20 && $columnas > 0 && $columnas <= 20) {
        $_SESSION['filas'] = $filas;
        $_SESSION['columnas'] = $columnas;
        header("Location: Tabla1Fila2Columna.php"); // Redirigir a la página Tabla1Fila2
        exit();
    } else {
        $error = "El tamaño de la tabla debe ser entre 1 y 20 filas/columnas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Tamaño de la Tabla</title>
</head>
<body>
    <h1>Ingrese el tamaño de la tabla</h1>
    <form method="POST" action="">
        <label for="filas">Número de filas:</label>
        <input type="number" id="filas" name="filas" min="1" max="20" required><br><br>
        <label for="columnas">Número de columnas:</label>
        <input type="number" id="columnas" name="columnas" min="1" max="20" required><br><br>
        <button type="submit">Generar Tabla</button>
    </form>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
