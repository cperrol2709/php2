<?php
// Accedemos a la sesión
session_name("subirbajar");
session_start();

// Si el número no está guardado en la sesión, redirigimos a la primera página
if (!isset($_SESSION["numero"])) {
    header("Location:ej03_formulario.php");
    exit;
}

// Recogemos accion
if (!isset($_GET["accion"])) {
    $accion="cero";
}
else{
    $accion=$_REQUEST["accion"];
}

// Dependiendo de la acción recibida, modificamos el número guardado 7
if ($accion == "cero") {
    $_SESSION["numero"] = 0;
} elseif ($accion == "subir") {
    $_SESSION["numero"]++;
} elseif ($accion == "bajar") {
    $_SESSION["numero"]--;
}

// Volvemos al formulario 8
header("Location:ej03_formulario.php");