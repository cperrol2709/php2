En la segunda página se muestra la tabla (con un límite de 20 filas/columnas).

<!-- Tabla1Fila2.php -->
<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['tamano'])) {
    header("Location: Tabla1Fila.php"); // Si no hay datos en la sesión, redirigir a la página Tabla1Fila
    exit();
}

$tamano = $_SESSION['tamano']; // Recuperamos el tamaño desde la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['marcadas'] = $_POST['marcadas']; // Guardamos las casillas marcadas en la sesión
    header("Location: Tabla1Fila3.php"); // Redirigir a la página Tabla1Fila3 con los resultados
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
    <h1>Tabla con casillas de verificación</h1>
    <p>Esta es una tabla con <?php echo $tamano; ?> casillas de verificación:</p>
    
    <form method="POST" action="">
        <table>
            <tr>
                <?php for ($i = 1; $i <= $tamano; $i++): ?>
                    <td>
                        <input type="checkbox" name="marcadas[]" value="<?php echo $i; ?>">
                    </td>
                <?php endfor; ?>
            </tr>
        </table><br><br>
        <button type="submit">Ver Casillas Marcadas</button>
    </form>
</body>
</html>
