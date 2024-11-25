<?php
session_name("hucha");
session_start();

function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))? trim(htmlspecialchars($_REQUEST[$var])): "";
    return $tmp;
}

if (!isset($_SESSION["cantidad"])) {
    header("Location:ej05_formulario.php");
    exit;
}

$moneda = recoge("moneda");
$accion = recoge("accion");

if ($accion == "Vaciar hucha") {
    $_SESSION["cantidad"] = 0;
} elseif ($moneda == 0.01 || $moneda == 0.02 || $moneda == 0.05 || $moneda == 0.10
    || $moneda == 0.20 || $moneda == 0.50 || $moneda == 1 || $moneda == 2) {
    $_SESSION["cantidad"] += $moneda;
}

header("Location:ej05_formulario.php");
?>