En la tercera página se indican los números de las casillas de verificación marcadas.

<!-- Tabla1Fila3.php -->
<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['marcadas']) || !isset($_SESSION['filas']) || !isset($_SESSION['columnas'])) {
    header("Location: Tabla1FilaColumna.php"); // Si no hay datos en la sesión, redirigir a la página Tabla1Fila
    exit();
}

$marcadas = $_SESSION['marcadas']; // Recuperamos las casillas marcadas desde la sesión
$filas = $_SESSION['filas']; // Recuperamos el número de filas desde la sesión
$columnas = $_SESSION['columnas']; // Recuperamos el número de columnas desde la sesión

$total_casillas = $filas * $columnas; // Total de casillas en la tabla
$total_marcadas = count($marcadas); // Número de casillas marcadas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Casillas Marcadas</title>
</head>
<body>
    <h1>Resultados</h1>
    <p>Se han recibido <?php echo $total_marcadas; ?> casilla(s) marcada(s) de un total de <?php echo $total_casillas; ?>.</p>
    <h2>Casillas Marcadas:</h2>
    <ul>
        <?php foreach ($marcadas as $casilla): ?>
            <li>Casilla número: <?php echo $casilla; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="Tabla1FilaColumna.php">Volver a empezar</a>
</body>
</html>
