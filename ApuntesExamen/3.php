En la tercera página se indica el número de respuestas y las respuestas dadas en cada 
pregunta.

<br>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración del conjunto de caracteres -->
    <meta charset="UTF-8">
    <!-- Ajuste para dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Document</title>
</head>
<body>
    <?php
    // Iteramos sobre el número de preguntas almacenadas en la sesión
    for ($i = 1; $i <= $_SESSION["v_preguntas"]; $i++) {
        // Para cada pregunta, iteramos sobre el número de respuestas posibles
        for ($j = 1; $j <= $_SESSION["v_respuestas"]; $j++) {
            // Comprobamos si el botón radio correspondiente fue seleccionado (está presente en POST)
            if (isset($_POST["$i"."$j"])) {
                // Mostramos el número de la pregunta y la opción de respuesta seleccionada
                echo "En la pregunta $i se ha contestado $j";
            }
        }
        // Insertamos un salto de línea después de cada pregunta
        echo "<br>";
    }
    ?>
    <!-- Enlaces para regresar a la página anterior (tabla) o al formulario inicial -->
    <a href="2.php">Volver a la tabla</a>
    <a href="1.php">Volver al formulario inicial</a>
</body>
</html>
