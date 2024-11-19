<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario</title>
</head>

<body>
    <h1>DATOS PERSONALES 1 (FORMULARIO)</h1>
    <form action="Ejercicio2_Check.php" method="get">
        <table>
            <tr>
                <td>Escriba su nombre:</td>
                <td>
                    <input type="text" name="nombre" size="30" maxlength="60">
                </td>
            </tr>

            <tr>
                <td>Escriba sus apellidos:</td>
                <td>
                    <input type="text" name="apellidos" size="60" maxlength="60">
                </td>
            </tr>

            <tr>
                <td>Escriba su edad:</td>
                <td>
                    <input type="number" name="edad" size="10" maxlength="20">
                </td>
            </tr>

            <tr>
                <td>Escriba su peso:</td>
                <td>
                    <input type="number" step="0.1" name="peso" size="10" maxlength="20">
                </td>
            </tr>
        </table>

        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
    </form>
    </div>
</body>

</html>