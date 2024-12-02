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
    <title>Listado de departamentos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_ASSOC)</h1>

    <?php
    // Realiza la conexión a la base de datos
    $conexion = conectarPDO($host, $user, $password, $bbdd);

    // Consulta actualizada con alias claros
    $consulta = "SELECT s.nombre AS sede_nombre, d.id AS departamento_id, d.nombre AS departamento_nombre, d.presupuesto 
                 FROM departamentos d 
                 JOIN sedes s ON d.sede_id = s.id";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);
    ?>
    <table border="1" cellpadding="10">
        <thead>
            <th>Sede</th>
            <th>Nombre</th>
            <th>Presupuesto</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- Recorrer y mostrar los resultados -->
            <?php
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($registro['sede_nombre']) . "</td>"; // Mostrar nombre de la sede
                echo "<td>" . htmlspecialchars($registro['departamento_nombre']) . "</td>"; // Mostrar nombre del departamento
                echo "<td>" . htmlspecialchars($registro['presupuesto']) . "</td>"; // Mostrar presupuesto
                echo "<td>";
                echo "<a href='modificar.php?idDepartamento=" . htmlspecialchars($registro['departamento_id']) . "' class='estilo_enlace'>&#9998;</a>"; // Icono de edición
                echo "<a href='borrar.php?idDepartamento=" . htmlspecialchars($registro['departamento_id']) . "' class='confirmacion_borrar'>&#128465;</a>"; // Icono de borrar
                echo "</td>";
                echo "</tr>" . PHP_EOL;
            }
            ?>
        </tbody>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.php">Volver a página de listados</a>
            <a href="nuevo.php">Añadir</a>
        </div>
    </div>

    <?php
    // Libera el resultado y cierra la conexión
    $resultado = null;
    $conexion = null;
    ?>
</body>
</html>
