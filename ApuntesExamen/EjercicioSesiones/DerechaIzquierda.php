Escriba un programa de dos páginas que muestre un punto sobre una línea y permita moverlo a derecha o izquierda mediante dos botones.

La primera página contiene un formulario con tres botones de tipo submit con el mismo atributo name.
La segunda página recibe el dato, modifica la variable que contiene la posición y redirige a la primera página.
El número se guarda en una variable de sesión. Si la variable no está definida, se le dará el valor 0.
El ancho de la línea son 600px y las coordenadas van de -300 a 300.
El punto avanza o retrocede de 20px en 20px.
Cuando el punto sale del dibujo por un lado, aparece en el lado opuesto.

<?php
// Iniciar sesión
session_start();

// Inicializar la posición si no existe
if (!isset($_SESSION["posicion"])) {
    $_SESSION["posicion"] = 0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Posición</title>
</head>
<body>
    <h1>Control de Posición</h1>
    <svg width="600" height="20">
        <!-- Línea negra -->
        <line x1="0" y1="10" x2="600" y2="10" stroke="black" stroke-width="2" />
        <!-- Círculo rojo -->
        <circle cx="<?php echo 300 + $_SESSION['posicion']; ?>" cy="10" r="8" fill="red" />
    </svg>
    <form method="POST" action="DerechaIzquierda2.php">
        <button name="accion" value="izquierda">Izquierda</button>
        <button name="accion" value="centro">Centro</button>
        <button name="accion" value="derecha">Derecha</button>
    </form>
</body>
</html>
