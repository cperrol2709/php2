<?php
session_start();
$repetir_palabra = trim($_POST["repetir_palabra"] ?? "");

if (empty($repetir_palabra)) {
    $_SESSION["error"] = "Debe escribir la palabra nuevamente.";
    header("Location: FormularioConfirmacion3.php");
    exit;
} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $repetir_palabra)) {
    $_SESSION["error"] = "La palabra solo puede contener letras y números.";
    header("Location: FormularioConfirmacion3.php");
    exit;
} elseif ($repetir_palabra !== $_SESSION["palabra"]) {
    $_SESSION["error"] = "La palabra no coincide con la primera.";
    header("Location: FormularioConfirmacion.php");
    exit;
}

$_SESSION["error"] = "";
header("Location: FormularioConfirmacion5.php");
exit;
