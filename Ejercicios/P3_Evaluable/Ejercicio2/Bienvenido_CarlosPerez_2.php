<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
  <h1>Datos personales</h1>

  <form action="Ficha_CarlosPerez_2.php" method="get">
    <p>Escriba los datos siguientes:</p>

    <table>
      <tr>
        <td>
          <label>
            <strong>Nombre:</strong><br>
            <input type="text" name="nombre" size="20" maxlength="20">
          </label>
        </td>
        <td>
          <label>
            <strong>Apellidos:</strong><br>
            <input type="text" name="apellidos" size="20" maxlength="20">
          </label>
        </td>
        <td>
          <strong>Edad:</strong><br>
          <select name="edad">
            <option>...</option>
            <option value="1">Menos de 20 años</option>
            <option value="2">Entre 20 y 39 años</option>
            <option value="3">Entre 40 y 59 años</option>
            <option value="4">60 años o más</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <label>
            <strong>Peso:</strong><br>
            <input type="number" step="0.1" name="peso" max="250"> kg
          </label>
        </td>
        <td>
          <strong>Género:</strong><br>
          <label><input type="radio" name="genero" value="hombre">Hombre</label>
          <label><input type="radio" name="genero" value="mujer">Mujer</label>
          <label><input type="radio" name="genero" value="no binario">No binario</label>
        </td>
        <td>
          <strong>Estado Civil:</strong><br>
          <label><input type="radio" name="estadoCivil" value="soltero">Solter@</label>
          <label><input type="radio" name="estadoCivil" value="casado">Casad@</label>
          <label><input type="radio" name="estadoCivil" value="viudo">Viud@</label>
          <label><input type="radio" name="estadoCivil" value="otro">Otro</label>

        </td>
      </tr>
    </table>

    <table style="border-spacing: 5px;">
      <tr>
        <td rowspan="2" class="borde"><strong>Aficiones:</strong></td>
        <td><label><input type="checkbox" name="cine">Cine</label></td>
        <td><label><input type="checkbox" name="lectura">Lectura</label></td>
        <td><label><input type="checkbox" name="television">Televisión</label></td>
      </tr>
      <tr>
        <td><label><input type="checkbox" name="deporte">Deporte</label></td>
        <td><label><input type="checkbox" name="musica">Música</label></td>
        <td><label><input type="checkbox" name="otros">Otros</label></td>
      </tr>
    </table>

    <p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>

</body>
</html>