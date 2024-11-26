Ejercicio 8:
Escribe un formulario que solicite nombres y los almacene en una sesión hasta que el usuario cierre
la sesión.
• La primera página:
◦ solicita un nombre
◦ muestra todos los valores escritos anteriormente en forma de lista.
◦ muestra un enlace para borrar todos los valores escritos anteriormente.

<?php
session_name("ej8");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Nombres</title>
</head>

<body>
    <h1>Formulario: Nombres</h1>
    <form action="Ej8_2.php" method="post">
        <!-- Campo para ingresar un nombre -->
        Nombre: <input type="text" name="nombre">
        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>

    <h2>Lista de nombres guardados:</h2>
    <ul>
        <?php
        // Mostrar los nombres almacenados en la sesión, si existen
        if (!empty($_SESSION['nombres'])) {
            foreach ($_SESSION['nombres'] as $nombre) {
                echo "<li>" . htmlspecialchars($nombre) . "</li>";
            }
        } else {
            echo "<li>No hay nombres almacenados.</li>";
        }
        ?>
    </ul>

    <!-- Enlace para borrar todos los nombres -->
    <p><a href="Ej8_2.php?action=clear">Borrar todos los nombres</a></p>
</body>

</html>
