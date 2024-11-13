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
    <h1>Listado de departamentos usando fetch (PDO::FETCH_BOUND)</h1>

    <?php

    // Realiza la conexion a la base de datos a través de una función

    $conexion = conectarBBDD($host, $user, $password, $bbdd);

    // Realiza la consulta a ejecutar en la base de datos en una variable

    $consulta = "SELECT s.nombre,d.nombre,d.presupuesto FROM departamentos d JOIN sedes s ON d.sede_id=s.id";

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement

    $resultado = $conexion->query($consulta);




    ?>
    <table border="1" cellpadding="10">
        <thead>
            <th>Sede</th>
            <th>Nombre</th>
            <th>Presupuesto</th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->

            <?php
            $resultado -> bindColumn(1,$departamento);
            $resultado -> bindColumn(2,$presupuesto);
            $resultado -> bindColumn(3,$sede);
            while($fila = $resultado -> fetch(mode: PDO::FETCH_BOUND)){
                echo "<tr>";
                echo "<td>$departamento</td>";
                echo "<td>$presupuesto</td>";
                echo "<td>$sede</td>";
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