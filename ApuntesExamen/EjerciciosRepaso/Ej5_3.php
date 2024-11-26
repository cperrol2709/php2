En la tercera página se indica el número de respuestas y las respuestas dadas en cada
pregunta.

<?php
// Verificar que se ha enviado el número de preguntas desde la página anterior
if (isset($_GET['num_preguntas'])) {
    $num_preguntas = $_GET['num_preguntas'];
    echo "<h1>Resultado de la Encuesta</h1>";

    // Mostrar el número de preguntas y las respuestas dadas
    for ($i = 1; $i <= $num_preguntas; $i++) {
        if (isset($_GET['pregunta_' . $i])) {
            $respuesta = $_GET['pregunta_' . $i];
            echo "<p><strong>Pregunta $i:</strong> Respuesta seleccionada: $respuesta</p>";
        } else {
            echo "<p><strong>Pregunta $i:</strong> No ha respondido.</p>";
        }
    }
} else {
    echo "<p>No se ha recibido el número de preguntas correctamente.</p>";
}
?>

