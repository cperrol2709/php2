Ejercicio 5:
Escribe un programa que permita contestar una encuesta ficticia. El programa constará de tres
páginas:
• En la primera página se solicita el número de preguntas (entre 1 y 10) y respuestas (entre 2 y
10).

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta - Paso 1</title>
</head>

<body>
    <h1>Encuesta Ficticia</h1>
    <p>Por favor, ingresa el número de preguntas y respuestas que deseas para la encuesta.</p>

    <form action="Ej5_2.php" method="get">
        <label for="pregunta1">Número de preguntas (entre 1 y 10):</label>
        <input type="number" name="pregunta1" min="1" max="10" required>
        <br><br>

        <label for="pregunta2">Número de respuestas (entre 2 y 10):</label>
        <input type="number" name="pregunta2" min="2" max="10" required>
        <br><br>

        <input type="submit" value="Generar Encuesta">
        <input type="reset" value="Borrar">
    </form>
</body>

</html>

