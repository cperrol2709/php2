En la segunda página se muestra las cajas de texto en una tabla.

<?php
// Página 2: Mostrar las cajas de texto en una tabla
session_start();

// Validar que el número de cajas está presente
if (!isset($_POST['num_cajas']) || $_POST['num_cajas'] < 1 || $_POST['num_cajas'] > 10) {
    echo "Número de cajas inválido.";
    exit;
}

// Guardar el número de cajas en la sesión
$_SESSION['num_cajas'] = intval($_POST['num_cajas']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajas de texto</title>
</head>
<body>
    <h1>Introducir palabras</h1>
    <form action="PalabrasRepetidas3.php" method="POST">
        <table border="1" cellpadding="5">
            <?php
            // Mostrar las cajas de texto en una tabla
            for ($i = 1; $i <= $_SESSION['num_cajas']; $i++) {
                echo "<tr><td>Palabra $i:</td><td><input type='text' name='palabra[]' required></td></tr>";
            }
            ?>
        </table>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
