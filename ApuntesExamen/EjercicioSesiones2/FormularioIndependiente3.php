<?php
session_start();
if (!empty($_POST['nombre'])) {
    $_SESSION['nombre'] = htmlspecialchars($_POST['nombre']);
    header("Location: FormularioIndependiente.html");
    exit();
} else {
    header("Location: FormularioIndependiente4.php?error=1");
    exit();
}
?>
