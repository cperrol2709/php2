<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selecciona tus deportes</title>
</head>
<body>
    <form action="procesamiento.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <p>Selecciona los deportes que practicas:</p>
        <input type="checkbox" name="deportes[]" value="futbol"> Fútbol<br>
        <input type="checkbox" name="deportes[]" value="basket"> Basket<br>
        <input type="checkbox" name="deportes[]" value="tennis"> Tennis<br>
        <input type="checkbox" name="deportes[]" value="voley"> Vóley<br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
