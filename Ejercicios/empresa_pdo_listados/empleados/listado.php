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
    <h1>Listado de empleados usando fetch (PDO::FETCH_OBJ)</h1>
    <?php
    // Realiza la conexion a la base de datos a través de una función

    $conexion = conectarBBDD($host, $user, $password, $bbdd);

    // Realiza la consulta a ejecutar en la base de datos en una variable

    $consulta = "SELECT e.nombre nombre,apellidos,email,hijos,salario,nacionalidad,d.nombre departamento,s.nombre sede FROM empleados e INNER JOIN departamentos d ON d.id=e.departamento_id
    INNER JOIN sedes s ON s.id=d.sede_id INNER JOIN paises p ON p.id = e.pais_id";

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement

    $resultado = $conexion->query($consulta);

    ?>

    <table border="1" cellpadding="10" style="margin-bottom: 10px;">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Hijos</th>
            <th>Salario</th>
            <th>Nacionalidad</th>
            <th>Departamento</th>
            <th>Pais</th>
        </thead>
        <tbody>

            <!-- Mostrar todos los datos de los empleados -->

            <?php


            while ($registro = $resultado->fetch(mode: PDO::FETCH_OBJ)) {
                echo "<tr><td>". $registro->nombre. "</td><td>" . $registro->apellidos . "</td><td>" . $registro->email . "</td><td>" . $registro->hijos . "</td><td>"
                 . $registro->salario . "</td><td>" . $registro->nacionalidad . "</td><td>" . $registro->departamento . "</td><td>" . $registro->sede . "</td></tr>";
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