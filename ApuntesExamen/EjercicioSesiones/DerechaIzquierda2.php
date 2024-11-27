<?php
// Iniciar sesión
session_start();

// Verificar que la posición exista
if (!isset($_SESSION["posicion"])) {
    $_SESSION["posicion"] = 0;
}

// Recoger la acción
$accion = $_POST['accion'] ?? '';

// Modificar la posición según la acción
if ($accion === "centro") {
    $_SESSION["posicion"] = 0;
} elseif ($accion === "izquierda") {
    $_SESSION["posicion"] -= 20;
} elseif ($accion === "derecha") {
    $_SESSION["posicion"] += 20;
}

// Ajustar la posición si sale del rango
if ($_SESSION["posicion"] > 300) {
    $_SESSION["posicion"] = -300;
} elseif ($_SESSION["posicion"] < -300) {
    $_SESSION["posicion"] = 300;
}

// Redirigir de vuelta a la primera página
header("Location: DerechaIzquierda.php");
exit();
