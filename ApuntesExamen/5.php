<?php
// Iniciamos la sesión para conservar los datos entre las diferentes solicitudes
session_start();

// Verificamos si la variable "contador" no está definida en la sesión
if (!isset($_SESSION["contador"])) {
    // Si no está definida, la inicializamos en 0
    $_SESSION["contador"] = 0;
}

// Comprobamos si se ha enviado un nombre a través del formulario
if (isset($_POST['nombre'])) {
    // Almacenamos el nombre enviado en la sesión
    $_SESSION['nombre'] = $_POST['nombre'];
    // Incrementamos el contador que representa el número de nombres añadidos
    $_SESSION["contador"]++;
}

// Verificamos si se ha presionado el botón "borrar" para reiniciar la sesión
if (isset($_POST['borrar'])) {
    // Destruimos la sesión actual para eliminar todos los datos almacenados
    session_destroy();
    // Reiniciamos la sesión para que el usuario pueda empezar de nuevo
    session_start();
}

// Redirigimos al usuario a "4.php" para mostrar los cambios realizados
header("Location: 4.php");
?>
