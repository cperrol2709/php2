<?php
session_start(); // Iniciar la sesion

if (!isset($_SESSION['num_entradas'])) {
    header("Location: Ejercicio4_1.php"); // Si no hay numero de entradas en sesion, redirigimos a la pagina 1
    exit();
}

$num_entradas = $_SESSION['num_entradas']; // Recuperamos el numero de entradas desde la sesion

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nombres'] = $_POST['nombre']; // Guardamos los nombres en la sesion
    $_SESSION['sexos'] = $_POST['sexo']; // Guardamos los sexos en la sesion
    header("Location: Ejercicio4_3.php"); // Redirigimos a la pagina 3 con los resultados
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

