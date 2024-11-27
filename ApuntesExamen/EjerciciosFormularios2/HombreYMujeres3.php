En la tercera página se indica cuántos datos completos se han recibido y los nombres de los hombres y mujeres.

<!-- pagina3.php -->
<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['nombres']) || !isset($_SESSION['sexos']) || !isset($_SESSION['num_entradas'])) {
    header("Location: HombreYMujeres.php"); // Si no hay datos en la sesión, redirigir a la página 1
    exit();
}

$nombres = $_SESSION['nombres']; // Recuperamos los nombres desde la sesión
$sexos = $_SESSION['sexos']; // Recuperamos los sexos desde la sesión
$num_entradas = $_SESSION['num_entradas']; // Recuperamos el número de entradas desde la sesión

$hombres = [];
$mujeres = [];
$total_completos = 0;

for ($i = 0; $i < count($nombres); $i++) {
    // Si hay nombre y sexo, contamos el dato como completo
    if (!empty($nombres[$i]) && isset($sexos[$i])) {
        $total_completos++;
        if ($sexos[$i] == 'Hombre') {
            $hombres[] = $nombres[$i];
        } else {
            $mujeres[] = $nombres[$i];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
</head>
<body>
    <h1>Resultados</h1>
    <p>Se han recibido <?php echo $total_completos; ?> dato(s) completo(s) de un total de <?php echo $num_entradas; ?>.</p>
    
    <h2>Hombres:</h2>
    <ul>
        <?php foreach ($hombres as $hombre): ?>
            <li><?php echo htmlspecialchars($hombre); ?></li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Mujeres:</h2>
    <ul>
        <?php foreach ($mujeres as $mujer): ?>
            <li><?php echo htmlspecialchars($mujer); ?></li>
        <?php endforeach; ?>
    </ul>
    
    <a href="HombreYMujeres.php">Volver a empezar</a>
</body>
</html>


