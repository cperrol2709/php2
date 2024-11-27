Escriba un programa de dos páginas que muestre un punto en un cuadrado y permita moverlo en vertical u horizontal mediante cuatro botones.

La primera página contiene un formulario con cinco botones de tipo submit con el mismo atributo name.
La segunda página recibe el dato, modifica las variables que contienen la posición (X e Y) y redirige a la primera página.
Los dos números se guardan en dos variables de sesión. Si las variables de sesión no están definidas, se les dará el valor 0.
El plano tiene 400px de lado y las coordenadas van de -200 a 200.
El punto avanza o retrocede de 20px en 20px.
Cuando el punto sale del dibujo por un lado, aparece en el lado opuesto.

<?php
// Iniciar sesión
session_start();

// Inicializar las posiciones si no existen
if (!isset($_SESSION["x"]) || !isset($_SESSION["y"])) {
    $_SESSION["x"] = 0;
    $_SESSION["y"] = 0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Posición 2D</title>
</head>
<body>
    <h1>Control de Posición 2D</h1>
    <svg version="1.1" width="400" height="400" viewBox="-200 -200 400 400" style="border: black 2px solid">
        <!-- Dibujar círculo rojo en la posición actual -->
        <circle cx="<?php echo $_SESSION['x']; ?>" cy="<?php echo $_SESSION['y']; ?>" r="8" fill="red" />
    </svg>
    <form method="POST" action="PuntosDimensiones2.php">
        <button name="accion" value="arriba">Arriba</button>
        <button name="accion" value="izquierda">Izquierda</button>
        <button name="accion" value="centro">Centro</button>
        <button name="accion" value="derecha">Derecha</button>
        <button name="accion" value="abajo">Abajo</button>
    </form>
</body>
</html>
