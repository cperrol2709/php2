En la segunda página se muestra la tabla (con un límite de 20 filas/columnas).

<!-- Tabla1Fila2.php -->
<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['filas']) || !isset($_SESSION['columnas'])) {
    header("Location: Tabla1FilaColumna.php"); // Si no hay datos en la sesión, redirigir a la página Tabla1Fila
    exit();
}

$filas = $_SESSION['filas']; // Recuperamos el número de filas desde la sesión
$columnas = $_SESSION['columnas']; // Recuperamos el número de columnas desde la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['marcadas'] = $_POST['marcadas']; // Guardamos las casillas marcadas en la sesión
    header("Location: Tabla1Fila3Columna.php"); // Redirigir a la página Tabla1Fila3 con los resultados
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Casillas de Verificación</title>
</head>
<body>
    <h1>Tabla de Casillas de Verificación</h1>
    <form method="POST" action="">
        <table border="1">
            <?php for ($i = 1; $i <= $filas; $i++): ?>
                <tr>
                    <?php for ($j = 1; $j <= $columnas; $j++): ?>
                        <td>
                            <input type="checkbox" name="marcadas[]" value="<?php echo ($i - 1) * $columnas + $j; ?>">
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table><br><br>
        <button type="submit">Ver Casillas Marcadas</button>
    </form>
</body>
</html>
