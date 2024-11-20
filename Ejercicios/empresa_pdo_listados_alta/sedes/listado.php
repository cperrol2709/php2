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
    <title>Listado de sedes</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de sedes usando fetch (PDO::FETCH_ASSOC)</h1>

    <?php
    // Realiza la conexion a la base de datos a través de una función

    $conexion = conectarPDO($host, $user, $password, $bbdd);

    // Realiza la consulta a ejecutar en la base de datos en una variable

    $consulta = "SELECT * FROM sedes";

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement

    $resultado = $conexion->query($consulta);

    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->

            <?php
            while ($fila = $resultado->fetch(mode: PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$fila['id']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['direccion']}</td>";
                echo "</tr>";
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