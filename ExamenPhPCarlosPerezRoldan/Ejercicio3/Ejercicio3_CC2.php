<?php
session_start();

if ($_POST['accion'] === 'lanzar') {
    // Simulamos el lanzamiento de la moneda
    $resultado = rand(0, 1) === 0 ? 'A' : 'B';
    $_SESSION['resultado'] = $resultado;

    // Actualizamos el contador correspondiente
    if ($resultado === 'A') {
        $_SESSION['cara_1a']++;
    } else {
        $_SESSION['cara_2b']++;
    }
} elseif ($_POST['accion'] === 'reiniciar') {
    // Reiniciamos los valores de la sesion
    $_SESSION['cara_1a'] = 0;
    $_SESSION['cara_2b'] = 0;
    $_SESSION['resultado'] = null;
}

// Redirigimos de vuelta a la pagina principal
header("Location: Ejercicio3_CC.php");
exit();
?>

