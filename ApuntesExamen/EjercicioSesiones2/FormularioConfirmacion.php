Escriba dos formularios encadenados que soliciten una palabra dos veces y compruebe que se ha escrito la misma palabra.

En la primera página, se solicita una única palabra. La palabra puede estar formada por minúsculas, mayúsculas o números (entremezclados en la misma palabra).
En la segunda página se comprueba la palabra:
Si no se ha escrito nada, se vuelve a la primera página, mostrando un aviso.
Si se ha escrito más de una palabra o hay caracteres distintos a letras y números, se vuelve a la primera página, mostrando un aviso.
Si se ha escrito una palabra válida, se pasa a la tercera página.
En la tercera página se pide repetir la palabra.
En la cuarta página se comprueba la segunda palabra:
Si no se ha escrito nada, se vuelve a la tercera página, mostrando un aviso.
Si se ha escrito más de una palabra o hay caracteres distintos a letras y números, se vuelve a la tercera página, mostrando un aviso.
Si la palabra es válida, pero no coincide con la primera, se vuelve a la primera página, mostrando un aviso.
Si se ha escrito una palabra válida y coincide con la primera, se pasa a la quinta página.
La quinta página muestra la palabra introducida.

<?php
session_start();
$_SESSION["error"] = $_SESSION["error"] ?? ""; // Inicializar el mensaje de error
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario 1</title>
</head>
<body>
    <h1>Formulario de Confirmación (Formulario 1)</h1>
    <p style="color:red;"><?php echo $_SESSION["error"]; ?></p>
    <form action="FormularioConfirmacion2.php" method="post">
        <label for="palabra">Escriba una palabra (con letras mayúsculas, minúsculas y números):</label>
        <input type="text" name="palabra" id="palabra" value="<?php echo $_SESSION["palabra"] ?? ""; ?>" />
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>
