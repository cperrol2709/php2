<?php
session_start();
$palabra = $_SESSION["palabra"] ?? "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Palabra Confirmada</h1>
    <p>La palabra ingresada y confirmada es: <strong><?php echo htmlspecialchars($palabra); ?></strong></p>
</body>
</html>
