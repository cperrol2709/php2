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

    $conexion = conectarPDO($host, $user, $password, $bbdd);

    // Realiza la consulta a ejecutar en la base de datos en una variable

    $consulta = "SELECT 
                e.id AS id, 
                e.nombre AS nombre, 
                e.apellidos AS apellidos, 
                e.email AS email, 
                e.hijos AS hijos, 
                e.salario AS salario, 
                p.nacionalidad AS nacionalidad, 
                d.nombre AS departamento, 
                s.nombre AS sede 
             FROM empleados e 
             INNER JOIN departamentos d ON d.id = e.departamento_id 
             INNER JOIN sedes s ON s.id = d.sede_id 
             INNER JOIN paises p ON p.id = e.pais_id";



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
            <th>Acciones</th>
        </thead>
        <tbody>

            <!-- Mostrar todos los datos de los empleados -->

            <?php
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($registro['nombre']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['apellidos']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['email']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['hijos']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['salario']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['nacionalidad']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['departamento']) . "</td>"; 
                echo "<td>" . htmlspecialchars($registro['sede']) . "</td>";
                echo "<td>";
                echo "<a href='modificar.php?idEmpleado=" . htmlspecialchars($registro['id']) . "' class='estilo_enlace'>&#9998;</a>"; 
                echo "<a href='borrar.php?idEmpleado=" . htmlspecialchars($registro['id']) . "' class='confirmacion_borrar'>&#128465;</a>"; 
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
    <script type="text/javascript">
        var elementos = document.getElementsByClassName("confirmacion_borrar");
        var confirmFunc = function(e) {
            if (!confirm('Está seguro de que desea borrar este regitro?')) e.preventDefault();
        };
        for (var i = 0, l = elementos.length; i < l; i++) {
            elementos[i].addEventListener('click', confirmFunc, false);
        }
    </script>
</body>

</html>