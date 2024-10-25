<?php
session_start();

// Generamos cinco nuevos dados aleatorios
if ($_POST['accion'] == 'tirada') {
    $_SESSION['tiradas']++;
    
    // Generamos nuevos valores para los dados
    $_SESSION['dados'] = [];
    for ($i = 0; $i < 5; $i++) {
        $_SESSION['dados'][] = rand(1, 6);
    }
    
    // Calculamos la puntuacion actual
    $puntuacion_actual = array_sum($_SESSION['dados']);
    
    // Actualizamos la puntuacion mas alta si es necesario
    if ($puntuacion_actual > $_SESSION['max_puntuacion']) {
        $_SESSION['max_puntuacion'] = $puntuacion_actual;
    }
    
    // Comprobamos si todos los dados son diferentes
    if (count(array_unique($_SESSION['dados'])) === 5) {
        $_SESSION['dados_diferentes']++;
    }
}

// Reiniciamos el juego
if ($_POST['accion'] == 'reiniciar') {
    $_SESSION['tiradas'] = 0;
    $_SESSION['dados_diferentes'] = 0;
    $_SESSION['max_puntuacion'] = 5;
    $_SESSION['dados'] = [1, 1, 1, 1, 1];
}

// Redirigimos de nuevo a la pagina principal
header('Location: Indice_Ej3.php');
exit();
