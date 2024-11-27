<?php
// Iniciar sesión
session_start();

// Verificar que las posiciones existen
if (!isset($_SESSION["x"]) || !isset($_SESSION["y"])) {
    $_SESSION["x"] = 0;
    $_SESSION["y"] = 0;
}

// Recoger la acción
$accion = $_POST['accion'] ?? '';

// Modificar las posiciones según la acción recibida
switch ($accion) {
    case "centro":
        $_SESSION["x"] = 0;
        $_SESSION["y"] = 0;
        break;
    case "izquierda":
        $_SESSION["x"] -= 20;
        break;
    case "derecha":
        $_SESSION["x"] += 20;
        break;
    case "arriba":
        $_SESSION["y"] -= 20;
        break;
    case "abajo":
        $_SESSION["y"] += 20;
        break;
}

// Ajustar posición si el punto se sale del área (rebote por los bordes)
if ($_SESSION["x"] > 200) {
    $_SESSION["x"] = -200;
} elseif ($_SESSION["x"] < -200) {
    $_SESSION["x"] = 200;
}
if ($_SESSION["y"] > 200) {
    $_SESSION["y"] = -200;
} elseif ($_SESSION["y"] < -200) {
    $_SESSION["y"] = 200;
}

// Redirigir de vuelta a la primera página
header("Location: PuntosDimensiones.php");
exit();
