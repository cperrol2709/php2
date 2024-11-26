• En la segunda página se muestra la encuesta utilizando botones radio.

<?php
// Verificar que se ha enviado correctamente el número de preguntas y respuestas
if (isset($_GET['pregunta1']) && isset($_GET['pregunta2'])) {
    $num_preguntas = $_GET['pregunta1'];
    $num_respuestas = $_GET['pregunta2'];

    // Verificar que el número de preguntas y respuestas es válido
    if ($num_preguntas > 0 && $num_respuestas >= 2) {
        echo "<h1>Encuesta</h1>";
        echo "<form action='Ej5_3.php' method='get'>";
        echo "<p>Valor de 1 a 3 cada uno de estos aspectos.</p>";
        
        // Enviar el número de preguntas como campo oculto para que lo reciban en la tercera página
        echo "<input type='hidden' name='num_preguntas' value='$num_preguntas'>";

        // Generar las preguntas y las respuestas dinámicamente
        for ($i = 1; $i <= $num_preguntas; $i++) {
            echo "<p><strong>Pregunta $i:</strong><br>";
            // Generar las opciones de respuesta para cada pregunta
            for ($j = 1; $j <= $num_respuestas; $j++) {
                echo "<label><input type='radio' name='pregunta_$i' value='respuesta_$j'> Respuesta $j</label><br>";
            }
            echo "</p>";
        }

        // Botón para enviar las respuestas
        echo "<p><input type='submit' value='Contar'></p>";
        echo "</form>";

    } else {
        echo "<p>Por favor ingrese un número válido de preguntas y respuestas (entre 1 y 10 preguntas, entre 2 y 10 respuestas).</p>";
    }
} else {
    echo "<p>Por favor ingrese el número de preguntas y respuestas en la primera página.</p>";
}
?>

