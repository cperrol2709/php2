<?php
session_name("hucha");
session_start();

if (!isset($_SESSION["cantidad"])) {
    $_SESSION["cantidad"]=0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Hucha de monedas. Sesiones.
  </title>
</head>

<body>
  <h1>Hucha de monedas</h1>

  <p>Haga clic en una moneda para añadirla al total.</p>

  <form action="ej05_codigo.php">
    <p>
      <button name="moneda" value="0.01">1 céntimo</button>
      <button name="moneda" value="0.02">2 céntimos</button>
      <button name="moneda" value="0.05">5 céntimos</button>
      <button name="moneda" value="0.10">10 céntimos</button>
      <button name="moneda" value="0.20">20 céntimos</button>
      <button name="moneda" value="0.50">50 céntimos</button>
      <button name="moneda" value="1">1 euro</button>
      <button name="moneda" value="2">2 euros</button>
    </p>
    <p>
<?php
    // Mostramos la cantidad guardada en la hucha
    echo "Dinero ahorrado: " . $_SESSION["cantidad"] .PHP_EOL;
?>
    </p>
    <p><input type="submit" name="accion" value="Vaciar hucha"></p>
  </form>
</body>
</html>
