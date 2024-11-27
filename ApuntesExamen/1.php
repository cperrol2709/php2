Escribe un programa que permita contestar una encuesta ficticia. El programa constará de tres
páginas:
• En la primera página se solicita el número de preguntas (entre 1 y 10) y respuestas (entre 2 y
10)

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="2.php" method="post">
    <p>
        Numero de preguntas: <input type = "number" name="pregunta" style="width: 100px;">
        <br>
        <br>
        Numero de respuestas: <input type = "number" name="respuesta" style="width: 100px;">
    </p>

    <p>
        <button type="submit" style="width: 100px;">Enviar</button>
        <button type="reset" style="width: 100px;">Borrar</button>
    </p>
    </form>
</body>

</html>