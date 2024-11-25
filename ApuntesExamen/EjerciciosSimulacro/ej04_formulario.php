<?php
session_name("tabla");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>
    Tabla cuadrada con casillas de verificación (Formulario).
  </title>
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación (Formulario)</h1>

  <p>Escriba un número (0 < número <=20) y dibujaré una tabla cuadrada de ese tamaño cpn casillas de verificación en cada celda. </p>

  <form action="ej04_tabla.php" method="get">
  <p>Tamaño de la tabla: 
  <select name="numeros" id="numeros">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
</select>


  </p>
  <input type="submit" value="Mostrar">
  <input type="reset" value="Borrar">

</form>
</body>
</html>