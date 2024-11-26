• En la cuarta página se comprueban los apellidos del usuario:
◦ Si no se ha escrito nada, se vuelve a la tercera página, mostrando un aviso.
◦ Si se ha escrito algo, se pasa a la quinta página.

<?php
session_name("ej7");
session_start();

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apellidos = trim($_POST["apellidos"]);
    if (empty($apellidos)) {
        // Si los apellidos están vacíos, redirigir a la tercera página
        $_SESSION['error_apellidos'] = "Debe escribir sus apellidos.";
        header("Location: Ej7_3.php");
        exit;
    }
    // Guardar los apellidos en la sesión y pasar a la quinta página
    $_SESSION['apellidos'] = $apellidos;
    header("Location: Ej7_5.php");
    exit;
}
