<?php
session_start();

// Validar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $texto_mayus = trim($_POST['texto_mayus']);
    $texto_minus = trim($_POST['texto_minus']);

    // Guardar los valores ingresados en la sesión
    $_SESSION['texto_mayus'] = $texto_mayus;
    $_SESSION['texto_minus'] = $texto_minus;

    // Validar el texto MAYÚSCULAS
    if (empty($texto_mayus)) {
        $_SESSION['mensaje_error'] = "El campo de MAYÚSCULAS no puede estar vacío.";
        header("Location: MayusculaMinuscula.php");
        exit();
    } elseif (!preg_match('/^[A-Z]+$/', $texto_mayus)) {
        $_SESSION['mensaje_error'] = "El campo de MAYÚSCULAS debe contener una única palabra en mayúsculas.";
        header("Location: MayusculaMinuscula.php");
        exit();
    }

    // Validar el texto minúsculas
    if (empty($texto_minus)) {
        $_SESSION['mensaje_error'] = "El campo de minúsculas no puede estar vacío.";
        header("Location: MayusculaMinuscula.php");
        exit();
    } elseif (!preg_match('/^[a-z]+$/', $texto_minus)) {
        $_SESSION['mensaje_error'] = "El campo de minúsculas debe contener una única palabra en minúsculas.";
        header("Location: MayusculaMinuscula.php");
        exit();
    }

    // Si ambas validaciones son correctas, preparar un mensaje de éxito
    $_SESSION['mensaje_exito'] = "Ha escrito correctamente:<br>
        - Una palabra en MAYÚSCULAS: <strong>" . htmlspecialchars($texto_mayus) . "</strong><br>
        - Una palabra en minúsculas: <strong>" . htmlspecialchars($texto_minus) . "</strong>.";
    unset($_SESSION['texto_mayus']);
    unset($_SESSION['texto_minus']);
    header("Location: MayusculaMinuscula.php");
    exit();
} else {
    // Si se accede directamente a esta página, redirigir al formulario
    header("Location: MayusculaMinuscula.php");
    exit();
}
