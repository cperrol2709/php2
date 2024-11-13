<?php

// Incluye ficheros de variables y funciones
require_once("../utiles/funciones.php");
require_once("../utiles/variables.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de empleados</title>
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
  <h1>Listado de empleados (filtrar por salario y/o número de hijos)</h1>
  <div style="margin-bottom: 1em">
    <fieldset style="width:50%">
      <legend>Filtrado</legend>
      <form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p><label for="texto">Texto <input type="text" name="texto"></label>
        </p>
        <p><label for="salarioMinimo">Salario mínimo <input type="number" step="0.01" name="salarioMinimo" min="0"></label>
          <label for="salarioMaximo">Salario Máximo <input type="number" step="0.01" name="salarioMaximo" min="0"></label>
        </p>
        <p>Hijos: <select name="hijos">
            <option value="">Seleccione el número de hijos</option>
            <?php
            for ($i = 0; $i <= 10; $i++):
            ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            endfor;
            ?>
          </select>
        </p>
        <input type="submit" value="Filtrar">
      </form>
    </fieldset>
  </div>
  <?php

  // Realiza la conexion a la base de datos a través de una función 

  $conexion = conectarBBDD($host, $user, $password, $bbdd);

  // $texto = $_POST['texto'] ?? '';
  if (isset($_POST['salarioMinimo']) || isset($_POST['salarioMaximo']) || isset($_POST['hijos'])) {
    $salarioMinimo = $_POST['salarioMinimo'] ?? 0;
    $salarioMaximo = $_POST['salarioMaximo'] ?? 0;
    $hijos = $_POST['hijos'] ?? '';
  }
  /* Crea las condiciones de filtrado. 
          Para ello deberías considerar crear una variable string que se construya como unión de las distintas condiciones.
          También una variable tipo array donde se vayan metiendo las distintas condiciones: la de texto, la de sueldos y la de hijos.
          Entre ambas, se debería construir la sentencia SQL para hacer el filtrado "WHERE..."*/

  $condiciones = array();
  $condicionesSQL = "";

  if (isset($_POST['texto'])) {
    $texto = $_POST['texto'];
    $condiciones[] = "(e.nombre LIKE '%$texto%' OR e.apellidos LIKE '%$texto%' OR e.email LIKE '%$texto%')";
  }

  if (isset($_POST['salarioMinimo']) && $_POST['salarioMinimo'] > 0) {
    $condiciones[] = "e.salario >= " . $_POST['salarioMinimo'];
  }

  if (isset($_POST['salarioMaximo']) && $_POST['salarioMaximo'] > 0) {
    $condiciones[] = "e.salario <= " . $_POST['salarioMaximo'];
  }

  if (isset($_POST['hijos']) && $_POST['hijos'] != "") {
    $condiciones[] = "e.hijos = " . $_POST['hijos'];
  }

  if (count($condiciones) > 0) {
    $condicionesSQL = " WHERE " . implode(" AND ", $condiciones);
  }

  // Realiza la consulta (SELECT) a ejecutar en la base de datos en una variable

  $consulta = "SELECT e.nombre nombre,apellidos,email,hijos,salario,nacionalidad,d.nombre departamento,s.nombre sede FROM empleados e INNER JOIN departamentos d ON d.id=e.departamento_id
  INNER JOIN sedes s ON s.id=d.sede_id INNER JOIN paises p ON p.id = e.pais_id $condicionesSQL" ;

  // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement

  $resultado = $conexion->query($consulta);

  // Muestra los criterios de búsqueda. Hay que tener en cuenta si el filtrado tiene algún resultado o no hay registros con el criterio de búsqueda, ya que si no hay resultados, se debería avisar. 

  ?>

  <table border="1" cellpadding="10">
    <thead>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo electrónico</th>
      <th>Nº hijos</th>
      <th>Salario</th>
      <th>Nacionalidad</th>
      <th>Departamento</th>
      <th>Sede</th>
    </thead>
    <tbody>

      <!-- Muestra los datos. Recorre la matriz para ir pintando los campos.-->

      <?php
      while ($fila = $resultado->fetch()) {
      ?>
        <tr>
          <td><?php echo $fila['nombre']; ?></td>
          <td><?php echo $fila['apellidos']; ?></td>
          <td><?php echo $fila['email']; ?></td>
          <td><?php echo $fila['hijos']; ?></td>
          <td><?php echo $fila['salario']; ?></td>
          <td><?php echo $fila['nacionalidad']; ?></td>
          <td><?php echo $fila['departamento']; ?></td>
          <td><?php echo $fila['sede']; ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="contenedor">
    <div class="enlaces">
      <a href="../index.php">Volver a página de listados</a>
    </div>
  </div>

  <?php

  // Libera el resultado y cierra la conexión

  $resultado = null;
  $conexion = null;

  ?>
</body>

</html>