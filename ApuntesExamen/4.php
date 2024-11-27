Ejercicio 8:
Escribe un formulario que solicite nombres y los almacene en una sesión hasta que el usuario cierre
la sesión.
• La primera página:
◦ solicita un nombre
◦ muestra todos los valores escritos anteriormente en forma de lista.
◦ muestra un enlace para borrar todos los valores escritos anteriormente.
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Configuración de codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Configuración de viewport para dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Document</title>
</head>

<body>
    <!-- Formulario que enviará datos al mismo script -->
    <form action="5.php" method="POST">
        <!-- Campo de entrada para solicitar un nombre -->
        Escribe tu nombre: <input type="text" name="nombre" style="width: 100px;">

        <p>
            <!-- Botón para enviar el formulario -->
            <button type="submit" style="width: 100px;">Añadir</button>
            <!-- Botón para limpiar el campo de texto -->
            <button type="reset" style="width: 100px;">Borrar</button>
        </p>

        <p>Datos introducidos:</p>

        <?php
        // Si existe la variable de sesión 'nombre', la guardamos en el array de nombres
        if (isset($_SESSION["nombre"])) {
            // Guardamos el nombre en un array dentro de la sesión, utilizando un contador como índice
            $_SESSION['nombres'][$_SESSION['contador']] = $_SESSION['nombre'];
        }
        ?>

        <!-- Sección para mostrar los nombres introducidos -->
        <ul>
            <?php
            // Si el contador está definido en la sesión, mostramos los nombres guardados
            if (isset($_SESSION["contador"])) {
                // Iteramos sobre los nombres almacenados utilizando el contador
                for ($i = 1; $i <= $_SESSION["contador"]; $i++) {
                    echo "<li>" . $_SESSION['nombres'][$i] . "</li>"; // Mostramos cada nombre en un elemento de lista
                }
            }
            ?>
        </ul>

        <br>
        <br>

        <!-- Botón para borrar todos los datos almacenados en la sesión -->
        <button name="borrar" type="submit">Cerrar sesion</button>
    </form>
</body>
</html>