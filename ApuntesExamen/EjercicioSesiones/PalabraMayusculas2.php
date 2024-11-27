<!-- pagina2.php -->
<!-- pagina2.php -->
<?php
session_start();

// Validar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $texto = trim($_POST['texto']);
    $_SESSION['texto_anterior'] = $texto; // Guardar el texto ingresado en la sesión

    // Validar el texto
    if (empty($texto)) {
        $_SESSION['mensaje_error'] = "El campo no puede estar vacío.";
        header("Location: PalabraMayusculas.php");
        exit();
    } elseif (!preg_match('/^[A-Z]+$/', $texto) || strpos($texto, ' ') !== false) {
        // Validar que sea una palabra única en mayúsculas
        $_SESSION['mensaje_error'] = "Debe ingresar una única palabra en MAYÚSCULAS.";
        header("Location: PalabraMayusculas.php");
        exit();
    } else {
        // Si el texto es válido, preparar un mensaje de éxito
        $_SESSION['mensaje_exito'] = "Ha escrito una palabra en mayúsculas: <strong>" . htmlspecialchars($texto) . "</strong>.";
        unset($_SESSION['texto_anterior']); // Limpiar el texto ingresado
        header("Location: PalabraMayusculas.php");
        exit();
    }
} else {
    // Si se accede directamente a esta página, redirigir al formulario
    header("Location: PalabraMayusculas.php");
    exit();
}
