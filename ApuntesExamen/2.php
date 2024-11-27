• En la segunda página se muestra la encuesta utilizando botones radio.

<br>

<?php
// Iniciamos la sesión para poder almacenar datos entre diferentes páginas
session_start();

// Comprobamos si se han enviado las variables "pregunta" y "respuesta" mediante POST
if (isset($_POST["pregunta"]) && isset($_POST["respuesta"])) {
    // Guardamos el número de preguntas en la sesión
    $_SESSION["v_preguntas"] = $_POST["pregunta"];
    // Guardamos el número de respuestas en la sesión
    $_SESSION["v_respuestas"] = $_POST["respuesta"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Establecemos el conjunto de caracteres como UTF-8 para soportar caracteres especiales -->
    <meta charset="UTF-8">
    <!-- Ajustamos la visualización para dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Document</title>
</head>

<body>
    <!-- Formulario que enviará datos a "3.php" utilizando el método POST -->
    <form action="3.php" method="POST">
        <?php
        // Generamos un bloque de preguntas y respuestas dinámicamente según los valores almacenados en la sesión

        // Iteramos sobre el número de preguntas definido en la sesión
        for ($i = 1; $i <= $_SESSION["v_preguntas"]; $i++) {
            // Mostramos el texto de la pregunta
            echo "Pregunta $i: ";
            // Iteramos sobre el número de opciones de respuesta definido en la sesión
            for ($j = 1; $j <= $_SESSION["v_respuestas"]; $j++) {
                // Creamos un botón de opción (radio) para cada respuesta
                // La estructura del atributo "name" del botón está formada por el número de pregunta y de respuesta
                echo "<input type='radio' name=$i" . "$j>";
            }
            // Insertamos un salto de línea después de cada pregunta
            echo "<br>";
        }
        ?>

        <p>
            <!-- Botón para enviar el formulario -->
            <button type="submit" style="width: 100px;">Enviar</button>
            <!-- Botón para restablecer el formulario (borrar datos seleccionados) -->
            <button type="reset" style="width: 100px;">Borrar</button>
        </p>
    </form>

    <!-- Enlace para volver a la primera página del formulario -->
    <a href="1.php">Volver a formulario</a>
</body>

</html>
