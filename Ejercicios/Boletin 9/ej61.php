<?php
session_name("sesion_tragaperras");
session_start();
require_once("validaciones.php");

// Inicializa las variables si no estan definidas
if (!isset($_SESSION["monedas"]) || !isset($_SESSION["tiradas"]) || !isset($_SESSION["premio"]) || !isset($_SESSION["fruta1"]) 
|| !isset($_SESSION["fruta2"]) || !isset($_SESSION["fruta3"])|| !isset($_SESSION["noCredit"])) {
  iniciarVariablestragaperras();
}
$accion  = obtenerValorCampo("accion");

if ($accion == "empezar") {
    iniciarVariablestragaperras();  // Reinicia las variables si se seleccionamos empezar
}
if ($accion == "moneda") {
    $_SESSION["monedas"]++;  // Incrementa las monedas al hacer clic en la moneda
}
if ($accion == "tirada"){
    if ($_SESSION["monedas"] > 0){
        // Genera tres frutas aleatorias al hacer una tirada
        $_SESSION["fruta1"] = rand(1, 8);
        $_SESSION["fruta2"] = rand(1, 8);
        $_SESSION["fruta3"] = rand(1, 8);
        $_SESSION["monedas"]--;  // Resta una moneda al hacer la tirada
    } else {
        $_SESSION["noCredit"] = true;  // Marca que no hay credito si no quedan monedas
    }
}

$cereza = 1; 

// Si han salido tres cerezas
if ($_SESSION["fruta1"] == $cereza &&
    $_SESSION["fruta2"] == $cereza &&
    $_SESSION["fruta3"] == $cereza) {
    $_SESSION["premio"] = 8;  // Premio de 8 si hay tres cerezas

// Si han salido dos cerezas
} elseif (($_SESSION["fruta1"] == $cereza && $_SESSION["fruta2"] == $cereza) ||
    ($_SESSION["fruta2"] == $cereza && $_SESSION["fruta3"] == $cereza) ||
    ($_SESSION["fruta1"] == $cereza && $_SESSION["fruta3"] == $cereza)) {
    $_SESSION["premio"] = 4;  // Premio de 4 si hay dos cerezas

// Si han salido tres frutas iguales
} elseif ($_SESSION["fruta1"] == $_SESSION["fruta2"] &&
    $_SESSION["fruta2"] == $_SESSION["fruta3"]) {
    $_SESSION["premio"] = 4;  // Premio de 4 si hay tres frutas iguales 

// Si han salido dos frutas iguales 
} elseif ($_SESSION["fruta1"] == $_SESSION["fruta2"] ||
    $_SESSION["fruta2"] == $_SESSION["fruta3"] ||
    $_SESSION["fruta1"] == $_SESSION["fruta3"]) {
    $_SESSION["premio"] = 1;  // Premio de 1 si hay dos frutas iguales 


} else {
    $_SESSION["premio"] = 0;  // Sin premio si no hay combinacion ganadora
}

// Se suman los premios a las monedas acumuladas
$_SESSION["monedas"] += $_SESSION["premio"];

header("Location:ej60.php");

?>
