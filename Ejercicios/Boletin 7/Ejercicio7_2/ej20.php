<html>
<body>
<?php
echo "<form action=ej21.php METHOD=POST>";

// Mostramos un mensaje solicitando el tamaño de la matriz y un campo de texto para ingresarlo
echo "Introduzca el tamaño de la matriz cuadrada con la que desee trabajar: <p> <input type=text name=\"N\" ></p>";

// Boton para enviar el formulario
echo "<input name=Enviar type=submit value=\"Enviar\">";
// Boton para resetear los campos del formulario
echo "<input name=Borrar type=reset value=\"Borrar\">";

echo "</form>";
?>
</body>
</html>
