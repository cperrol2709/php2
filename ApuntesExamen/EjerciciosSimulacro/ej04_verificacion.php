<?php
session_name("tabla");
session_start();

// Si el tamaño de la tabla no está guardado en la sesión, o no llega la tabla vuelve al formulario
if (!isset($_SESSION["numero"]) || !isset($_GET["c"])) {
    header("Location: ej04_formulario.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Tabla cuadrada con casillas de verificación (Resultado).
  </title>
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación (Resultado)</h1>

<?php
// Recogida de datos
$matriz=$_GET["c"];
print "<pre>";
print_r ($matriz);
print "</pre>";

// Se cuenta el número de elementos en la matriz $c
$casillasMarcadas = count($matriz);
if ($casillasMarcadas == 0) {
    echo "  <p>No ha marcado ninguna casilla.</p>". PHP_EOL;
} else {
    echo "  <p>Ha marcado <strong>$casillasMarcadas</strong> casilla";
    if ($casillasMarcadas > 1) {
        echo "s";
    }
    echo " de un total de <strong>" . $_SESSION["numero"] * $_SESSION["numero"] . "</strong>: <strong>";
    // Bucle para escribir los índices de las casillas recibidas
    foreach ($matriz as $indice => $valor) {
        echo "$indice ";
    }
    echo "</strong></p>" . PHP_EOL;
}
?>
  <p><a href="ej04_formulario.php">Volver al formulario.</a></p>
</body>
</html>