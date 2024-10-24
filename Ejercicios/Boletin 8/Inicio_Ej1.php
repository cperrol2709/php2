<html lang="es">

<head>
    <meta charset="utf-8">
    </title>
</head>

<div style='border: 1px solid #000; width: 600px; height: 190px '>

    <body>
        <h1>Introduzca los datos</h1>
        <form action="Check_Ej1.php" method="get">
            <table>
                <tr>
                    <td>Correo electronico:</td>
                    <td> <input type="text" name="email" size="60" maxlength="60" placeholder="@email"></p>
                </tr>
                <tr>
                    <td>Indique su edad:</td>
                    <td> <input type="number" name="edad" size="20" maxlength="60" placeholder="Entre 18 y 65 años"></p>
                </tr>
            </table>
            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</div>

</html>