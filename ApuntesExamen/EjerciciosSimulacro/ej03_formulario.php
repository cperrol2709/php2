<?php
// Accedemos a la sesión 1
session_name("subirbajar");
session_start();
// Si el número no está guardado en la sesión, ponemos el valor a cero
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Subir y bajar número.
  </title>
</head>
<body>
  <h1>Subir y bajar número</h1>
  <form action="ej03_codigo.php" method="get">
    <p>Haga clic en los botones para modificar el valor:</p>
    <p>
      <button type="submit" name="accion" value="bajar" style="font-size: 4rem">-</button>
<?php
    // Mostramos el número, guardado en la sesión 3
    echo "<span style=\"font-size: 4rem\">$_SESSION[numero]</span>".PHP_EOL;
?>
      <button type="submit" name="accion" value="subir" style="font-size: 4rem">+</button>
    </p>
    <p>
      <button type="submit" name="accion" value="cero">Poner a cero</button>
    </p>
  </form>
</body>
</html>
