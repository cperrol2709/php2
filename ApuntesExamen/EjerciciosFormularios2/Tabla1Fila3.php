En la tercera página se indican los números de las casillas de verificación marcadas.

<!-- Tabla1Fila3.php -->
<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['marcadas']) || !isset($_SESSION['tamano'])) {
    header("Location: Tabla1Fila.php"); // Si no hay datos en la sesión, redirigir a la página Tabla1Fila
    exit();
}

$marcadas = $_SESSION['marcadas']; // Recuperamos las casillas marcadas desde la sesión
$tamano = $_SESSION['tamano']; // Recuperamos el tamaño desde la sesión

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
    <p>Se han recibido <?php echo $total_marcadas; ?> casilla(s) marcada(s) de un total de <?php echo $tamano; ?>.</p>
    <h2>Casillas Marcadas:</h2>
    <ul>
        <?php foreach ($marcadas as $casilla): ?>
            <li>Casilla número: <?php echo $casilla; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="Tabla1Fila.php">Volver a empezar</a>
</body>
</html>
