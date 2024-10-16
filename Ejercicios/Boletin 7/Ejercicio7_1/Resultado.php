<?php
$elementos = $_POST['elemento'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    
    <p>Tus datos originales son:</p>
    <ul>
        <?php foreach ($elementos as $elemento): ?>
            <li><?php echo htmlspecialchars($elemento); ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Tus datos originales son:</p>
    <ul>
        <?php foreach (array_reverse($elementos) as $elemento): ?>
            <li><?php echo htmlspecialchars($elemento); ?></li>
        <?php endforeach; ?>
    </ul>

    <p><a href='Index.php'>Volver al formulario</a></p>
</body>
</html>

