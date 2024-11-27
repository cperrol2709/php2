<?php
session_start();

if ($_POST['accion'] === 'lanzar') {
    // Simular el lanzamiento de la moneda
    $resultado = rand(0, 1) === 0 ? 'A' : 'B';
    $_SESSION['ultimo_resultado'] = $resultado;

    // Actualizar el contador correspondiente
    if ($resultado === 'A') {
        $_SESSION['cara_a']++;
    } else {
        $_SESSION['cara_b']++;
    }
} elseif ($_POST['accion'] === 'reiniciar') {
    // Reiniciar los valores de la sesión
    $_SESSION['cara_a'] = 0;
    $_SESSION['cara_b'] = 0;
    $_SESSION['ultimo_resultado'] = null;
}

// Redirigir de vuelta a la página principal
header("Location: CaraOCruz.php");
exit();
?>

