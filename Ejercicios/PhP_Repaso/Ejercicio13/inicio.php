<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contrato</title>
</head>
<body>
    <h1>Complete el contrato</h1>
    <form action="procesamiento.php" method="post">
        <label>Ciudad:</label>
        <input type="text" name="ciudad" required><br><br>

        <label>Empresa:</label>
        <input type="text" name="empresa" required><br><br>

        <label>Representante:</label>
        <input type="text" name="representante" required><br><br>

        <label>Domicilio de la Empresa:</label>
        <input type="text" name="domicilio_empresa" required><br><br>

        <label>Empleado:</label>
        <input type="text" name="empleado" required><br><br>

        <label>Domicilio del Empleado:</label>
        <input type="text" name="domicilio_empleado" required><br><br>

        <button type="submit">Generar Contrato</button>
    </form>
</body>
</html>
