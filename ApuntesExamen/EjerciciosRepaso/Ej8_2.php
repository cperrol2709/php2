• La segunda página comprueba:
◦ si se ha escrito algo de texto, lo guarda en $_SESSION.
◦ si se ha pedido borrar todos los nombres, los borra.
◦ en todos los casos, vuelve automáticamente a la primera página.

<?php
session_name("ej8");
session_start();

// Verificar si se desea borrar todos los nombres
if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    // Borrar todos los nombres almacenados en la sesión
    unset($_SESSION['nombres']);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Si el formulario fue enviado, tomar el nombre ingresado
    $nombre = trim($_POST['nombre']);

    // Guardar el nombre en la sesión solo si no está vacío
    if (!empty($nombre)) {
        if (!isset($_SESSION['nombres'])) {
            $_SESSION['nombres'] = []; // Inicializar si no existe
        }
        $_SESSION['nombres'][] = $nombre;
    }
}

// Redirigir de vuelta a la primera página
header("Location: Ej8_1.php");
exit;
