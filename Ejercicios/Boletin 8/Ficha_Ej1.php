<?php

$mail = $_GET['email'];
$edad = $_GET['edad'];

echo "<div style='border: 2px solid #000; padding: 10px; width: 300px;'>";
echo "<h1><strong>Ficha</strong></h1>";
echo "<p>Correo electronico: <strong>$mail</strong>";
echo "<p>Edad: <strong>$edad</strong> años";

echo "<p><a href='Inicio_Ej1.php'>Volver al formulario.</a></p>";
?>

