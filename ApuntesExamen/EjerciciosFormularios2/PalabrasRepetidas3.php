En la tercera página se indica cuántas cajas se han rellenado y si se han rellenado 2 o más cajas de texto, se indica si hay o no algún texto repetido (sin indicar ni cuántos ni cuáles).

<?php
// Página 3: Comprobar repeticiones
session_start();

// Validar que las palabras han sido enviadas
if (!isset($_POST['palabra']) || !is_array($_POST['palabra'])) {
    echo "No se recibieron palabras.";
    exit;
}

$palabras = array_map('trim', $_POST['palabra']); // Eliminar espacios en blanco
$rellenadas = array_filter($palabras, fn($p) => !empty($p)); // Filtrar palabras no vacías
$total_rellenadas = count($rellenadas);

// Verificar repeticiones
$unicas = array_unique($rellenadas);
$hay_repetidas = count($rellenadas) !== count($unicas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <h1>Resultados</h1>
    <p>Número de cajas rellenadas: <?php echo $total_rellenadas; ?></p>
    <?php if ($total_rellenadas >= 2): ?>
        <p><?php echo $hay_repetidas ? "Hay palabras repetidas." : "No hay palabras repetidas."; ?></p>
    <?php else: ?>
        <p>No hay suficientes palabras para comprobar repeticiones.</p>
    <?php endif; ?>
    <br>
    <a href="PalabrasRepetidas.php">Volver al inicio</a>
</body>
</html>
