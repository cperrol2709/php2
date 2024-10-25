<?php
session_start();

// Obtener los datos de la sesion
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$edad = isset($_SESSION['edad']) ? $_SESSION['edad'] : null;

// Mostrar los datos si estan disponibles
if ($email && $edad) {
    echo "<div style='border: 1px solid #000; padding: 10px; width: 300px;'>";
    echo "<h1><strong>Ficha</strong></h1>";
    echo "<p>Correo electrónico: <strong>$email</strong></p>";
    echo "<p>Edad: <strong>$edad</strong> años</p>";
    echo "<p><a href='Inicio_Ej1.php'>Volver al formulario.</a></p>";
    echo "</div>";
} else {
    echo "<p>No se han recibido datos correctamente.</p>";
}
?>


