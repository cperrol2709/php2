<html lang="es">
<head>
  <meta charset="utf-8">
  </title>
  </head>

<body>
  <h1>Ejemplo de recogida de datos</h1>

  <form action="Check_CarlosPerez_1.php" method="get">
    <table>
      <tr>
        <td>Nombre:</td>
        <td><input type="text" name="nombre" size="30" maxlength="20"></td>
      </tr>
      <tr>
        <td>Apellidos:</td>
        <td> <input type="text" name="apellidos" size="30" maxlength="60"></p>
      </tr>
      <tr>
        <td>Número de DNI (sin letra):</td>
        <td><input type="number" name="dni" min="1" max="99999999" Required></td>
      </tr>
      <tr>
        <td>Letra del DNI:</td>
        <td><input type="text" name="Letra" size="30" maxlength="1"></td>
      </tr>
      <tr>
        <td>email:</td>
        <td> <input type="text" name="email" size="30" maxlength="60"></p>
      </tr>
    </table>

    <p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <footer>
    <p class="ultmod">
      Fin de página.
    </p>
  </footer>
</body>
</html>
