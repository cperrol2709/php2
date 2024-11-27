<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Datos personales</h1>

    <form action="Ejercicio2_check.php" method="get">
        <p>Escriba los datos siguientes:</p>

        <table>
            <tr>
                <td>
                    <label>
                        Escriba su nombre: <input type="text" name="nombre" size="20" maxlength="20">
                    </label>
                </td>
                <tr>
                <td>
                    <label>
                        Escriba sus apellidos: <input type="text" name="apellidos" size="20" maxlength="20">
                    </label>
                </td>
                </tr>
                <td>
                    <label>
                        Indique su sexo y aficiones
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Sexo:</strong>
                    <label><input type="radio" name="sexo" value="hombre">Hombre</label>
                    <label><input type="radio" name="sexo" value="mujer">Mujer</label>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td><strong>Aficiones:</strong></td>
                <td><label><input type="checkbox" name="cine">Cine</label></td>
                <td><label><input type="checkbox" name="literatura">Literatura</label></td>
                <td><label><input type="checkbox" name="musica">Música</label></td>
            </tr>
        </table>

        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
    </form>

</body>

</html>