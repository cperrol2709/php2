• En la segunda página se comprueba el nombre del usuario:
◦ Si no se ha escrito nada, se vuelve a la primera página, mostrando un aviso.
◦ Si se ha escrito algo, se pasa a la tercer página.

<?php
session_name("ej7");
session_start();

// Comprobar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    if (empty($nombre)) {
        // Si el nombre está vacío, redirigir a la primera página
        $_SESSION['error_nombre'] = "Debe escribir su nombre.";
        header("Location: Ej7_1.php");
        exit;
    }
    // Guardar el nombre en la sesión y pasar a la tercera página
    $_SESSION['nombre'] = $nombre;
    header("Location: Ej7_3.php");
    exit;
}
?>