<?php
session_start();
$_SESSION["error"] = $_SESSION["error"] ?? ""; // Inicializar el mensaje de error
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario 3</title>
</head>
<body>
    <h1>Formulario de Confirmación (Formulario 3)</h1>
    <p style="color:red;"><?php echo $_SESSION["error"]; ?></p>
    <form action="FormularioConfirmacion4.php" method="post">
        <label for="repetir_palabra">Escriba nuevamente la palabra:</label>
        <input type="text" name="repetir_palabra" id="repetir_palabra" />
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>
