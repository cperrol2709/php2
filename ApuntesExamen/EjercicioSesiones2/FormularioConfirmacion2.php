<?php
session_start();
$palabra = trim($_POST["palabra"] ?? "");

if (empty($palabra)) {
    $_SESSION["error"] = "Debe escribir una palabra.";
    header("Location: FormularioConfirmacion.php");
    exit;
} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $palabra)) {
    $_SESSION["error"] = "La palabra solo puede contener letras y números.";
    header("Location: FormularioConfirmacion.php");
    exit;
}

$_SESSION["palabra"] = $palabra;
$_SESSION["error"] = "";
header("Location: FormularioConfirmacion3.php");
exit;
