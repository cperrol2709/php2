<?php
// Se inicia la sesión con un nombre 
session_name("sesion_tragaperras");
session_start();

// Se incluye el archivo validaciones.php para manejar funciones adicionales
require_once("validaciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tragaperras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Archivo CSS externo para el diseño de la página -->
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>
<body>
  <h1>Tragaperras</h1>
  
<?php
// Inicio del formulario que envia las acciones al archivo ej61.php usando el método GET
print "<form action=\"ej61.php\" method=\"get\">\n";

// Verificacion inicial de variables de sesion; si no estan definidas, se inicializan
if (!isset($_SESSION["monedas"]) || !isset($_SESSION["tiradas"]) || !isset($_SESSION["premio"]) || !isset($_SESSION["fruta1"]) 
|| !isset($_SESSION["fruta2"]) || !isset($_SESSION["fruta3"])) {
  iniciarVariablestragaperras();  // Función para inicializar las variables
}

// Botón para añadir una moneda (aumenta créditos)
print "<button type=\"submit\" name=\"accion\" value=\"moneda\" style=\"background-image: url('frutas/euro.jpg'); border:0; width: 72px; height: 72px\"></button>" . PHP_EOL;

// Si el usuario tiene creditos , muestra el botón para jugar
if (!$_SESSION["noCredit"]){
  print "<p>" . PHP_EOL. "<button type=\"submit\" name=\"accion\" value=\"tirada\" style=\"background-image: url('frutas/tragaperra.jpg'); border:0; width: 90px; height: 100px\"></button></p>" . PHP_EOL;
}else{
  // Si no hay creditos, se muestra la imagen de Game Over y un botón para reinicia
  print "<p><img src=\"frutas/gameover.jpg\" width=\"100\" alt=\"Imagen\">" . PHP_EOL;
  echo "  <p><button type=\"submit\" name=\"accion\" value=\"empezar\">Nueva Partida</button></p>" . PHP_EOL;
}

// Se muestran las tres imagenes de las frutas
print "<img src=\"frutas/".$_SESSION['fruta1'].".svg\" width=\"100\" alt=\"Imagen\">\n";
print "<img src=\"frutas/".$_SESSION['fruta2'].".svg\" width=\"100\" alt=\"Imagen\">\n";
print "<img src=\"frutas/".$_SESSION['fruta3'].".svg\" width=\"100\" alt=\"Imagen\">\n";

// Muestra los creditos acumulados en el juego
print "<p>Créditos Acumulados: ". $_SESSION['monedas']."</p>\n";

// Muestra el premio obtenido en la ultima tirada
print "<p>Premio: ". $_SESSION['premio']."</p>\n";

// Botón para reiniciar la partida
echo "<p><button type=\"submit\" name=\"accion\" value=\"empezar\">Reiniciar</button></p>";

?>
</body>
</html>

