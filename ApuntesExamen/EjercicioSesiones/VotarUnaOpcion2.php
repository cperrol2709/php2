<?php
// Iniciar sesión
session_start();

// Inicializar contadores si no existen
if (!isset($_SESSION["a"])) $_SESSION["a"] = 0;
if (!isset($_SESSION["b"])) $_SESSION["b"] = 0;

// Recoger la acción seleccionada
$accion = $_POST['accion'] ?? '';

// Modificar los valores según la acción
switch ($accion) {
    case "a":
        $_SESSION["a"] += 10;
        break;
    case "b":
        $_SESSION["b"] += 10;
        break;
    case "cero":
        $_SESSION["a"] = $_SESSION["b"] = 0;
        break;
}

// Redirigir de vuelta a la página principal
header("Location: VotarUnaOpcion.php");
exit();
