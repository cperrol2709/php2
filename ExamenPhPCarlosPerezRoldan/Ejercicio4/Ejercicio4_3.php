<?php
session_start(); // Iniciar la sesion

if (!isset($_SESSION['nombres']) || !isset($_SESSION['sexos']) || !isset($_SESSION['num_entradas'])) {
    header("Location: HombreYMujeres.php"); // Si no hay datos en la sesion,redirigimos a la pagina 1
    exit();
}

$nombres = $_SESSION['nombres']; // Recuperamos los nombres desde la sesion
$sexos = $_SESSION['sexos']; // Recuperamos los sexos desde la sesion
$num_entradas = $_SESSION['num_entradas']; // Recuperamos el numero de entradas desde la sesion

$hombres = [];
$mujeres = [];
$total_completos = 0;

for ($i = 0; $i < count($nombres); $i++) {
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
    <title>Resultado</title>
</head>

<body>
    <h1>Resultado</h1>
    <p>Se han recibido <?php echo $total_completos; ?> datos completos de un total de <?php echo $num_entradas; ?>.</p>

    <strong>Hombres:</strong>
    <?php foreach ($hombres as $hombre): ?>
        <li><?php echo htmlspecialchars($hombre); ?></li>
    <?php endforeach; ?>

    <strong>Mujeres:</strong>
    <?php foreach ($mujeres as $mujer): ?>
        <li><?php echo htmlspecialchars($mujer); ?></li>
    <?php endforeach; ?>

    <a href="Ejercicio4_1.php">Inicio</a>
</body>

</html>