<?php
session_name("tabla");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>
    Tabla cuadrada con casillas de verificación (Formulario).
  </title>
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación (Formulario)</h1>

  <p>Marque las casillas de verificación que quiera y contaré cuántas ha marcado.</p>

  <form action="ej04_verificacion.php" method="get">
    <table class="conborde">
<?php
// Recogemos accion
if (!isset($_GET["numeros"])) {
    header("Location:ej04_formulario.php");
    exit;
}
else{
    $numero = $_REQUEST["numeros"];
}
//$numero = rand(2, 20);

// Guarda en la sesión el número de casillas
$_SESSION["numero"] = $numero;

// Bucle anidado para generar la tabla cuadrada con casillas de verificación
// Creamos un contador para generar el índice de la casilla de verificación
$contador = 1;
for ($i = 0; $i < $numero; $i++) {
    print "      <tr>\n";
    for ($j = 1; $j <= $numero; $j++) {
        // El nombre del control es una matriz (c[])
        print "        <td><label><input type=\"checkbox\" name=\"c[$contador]\"> $contador</label></td>\n";
        $contador++;
    }
    print "      </tr>\n";
}
?>
    </table>

    <p>
      <input type="submit" value="Contar">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>