En la segunda página se muestran las cajas de texto y botones radio.

<!-- pagina2.php -->
<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['num_entradas'])) {
    header("Location: HombreYMujeres.php"); // Si no hay número de entradas en sesión, redirigir a la página 1
    exit();
}

$num_entradas = $_SESSION['num_entradas']; // Recuperar el número de entradas desde la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nombres'] = $_POST['nombre']; // Guardamos los nombres en la sesión
    $_SESSION['sexos'] = $_POST['sexo']; // Guardamos los sexos en la sesión
    header("Location: HombreYMujeres3.php"); // Redirigimos a la página 3 con los resultados
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Datos</title>
</head>
<body>
    <h1>Ingrese los datos de las personas</h1>
    <form method="POST" action="">
        <?php for ($i = 0; $i < $num_entradas; $i++): ?>
            <div>
                <label>Nombre <?php echo $i + 1; ?>:</label>
                <input type="text" name="nombre[]">
            </div>
            <div>
                <label>Sexo:</label>
                <input type="radio" name="sexo[<?php echo $i; ?>]" value="Hombre"> Hombre
                <input type="radio" name="sexo[<?php echo $i; ?>]" value="Mujer"> Mujer
            </div>
        <?php endfor; ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

