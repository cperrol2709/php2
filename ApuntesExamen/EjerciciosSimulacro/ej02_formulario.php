<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Datos personales 1 (Formulario).
  </title>
</head>

<body>
  <h1>Datos personales 1 (Formulario)</h1>
  <form action="ej02_codigo.php" method="get">
    <p><label>Escriba su nombre: <input type="text" name="nombre" size="20" maxlength="20"></label></p>
    <p><label>Escriba sus apellidos: <input type="text" name="apellidos" size="40" maxlength="40"></label></p>
    <p><label>Escriba su edad: <input type="number" name="edad" min="5" max="130"></label></p>
    <p><label>Escriba su peso: <input type="number" name="peso" step="0.1" min="10" max="150"></label></p>
    <p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>
 </body>
</html>