<?php
require_once("../utiles/variables.php");
require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar departamento</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>

    <body>
        <h1>Modificar departamento</h1>
        <?php
        // crea las variables para la comprobación de los datos y conectamos con la BBDD para obtener y pintar los datos de la id que acabamos de enviar a la página

        $errores = [];
        $idDepartamento = 0;
        $nombre = "";
        $presupuesto = 0;
        $sede_id = 0;

        $conexion = conectarpdo($host, $user, $password, $bbdd);

        if (count($_REQUEST) > 0) {
            if (isset($_GET["idDepartamento"])) {
                $idDepartamento = $_GET["idDepartamento"];

                //Conectamos a la BBDD
                $conexion = conectarpdo($host, $user, $password, $bbdd);
                // Montamos la consulta a ejecutar
                $query = "SELECT id, nombre, presupuesto, sede_id FROM departamentos WHERE id = ?";
                $consulta = $conexion->prepare($query);

                // prepararamos la consulta
                $consulta->execute([$idDepartamento]);

                // comprobamos si hay algún registro 
                if ($consulta->rowCount() == 0) {
                    //Si no lo hay, desconectamos y volvemos al listado original
                    $consulta = null;
                    $conexion = null;
                    header("Location: listado.php");
                    exit();
                } else {
                    // Si hay algún registro, Obtenemos el resultado (usamos fetch())
                    $registro = $consulta->fetch(PDO::FETCH_ASSOC);
                    $nombre = $registro['nombre'];
                    $presupuesto = $registro['presupuesto'];
                    $sede_id = $registro['sede_id'];
                }
            } else {
                // Comenzamos la comprobación de los datos introducidos.
                // Creamos las variables con los requisitos de cada campo
                $lonDepMin = 3;
                $lonDepMax = 100;

                $idDepartamento = obtenerValorCampo("id");
                $nombre = obtenerValorCampo("nombre");
                $presupuesto = obtenerValorCampo("presupuesto");
                $sede_id = obtenerValorCampo("sede_id");

                //-----------------------------------------------------
                // Validaciones
                //-----------------------------------------------------
                // Comprueba que el id del departamento se corresponde con uno que tengamos 
                // conectamos a la bbdd
                if (!validarEnteroPositivo($idDepartamento)) {
                    header("Location: listado.php");
                    exit();
                }

                // Nombre del departamento: validamos la longitud. Si no es correcta, generamos el error.
                if (!validarLongitudCadena($nombre, $lonDepMin, $lonDepMax)) {
                    $errores["nombre"] = "El nombre del departamento no cumple los requisitos.";
                } else {
                    // Comprobar que no exita un departamento con ese nombre.
                    $query = "SELECT id FROM departamentos WHERE nombre = ? AND id != ?";
                    $consulta = $conexion->prepare($query);
                    $consulta->execute([$nombre, $idDepartamento]);

                    // comprobamos si, al ejecutar la consulta, tenemos más de un registro. En tal caso, generar el mensaje de error.
                    if ($consulta->rowCount() > 0) {
                        $errores["nombre"] = "Ya existe un departamento con este nombre.";
                    }
                }

                // Presupuesto del departamento: Validamos que sea entero positivo.
                if (!validarEnteroPositivo($presupuesto)) {
                    $errores["presupuesto"] = "El presupuesto no cumple los requisitos.";
                }

                // Nombre de la sede: Validamos que sea entero positivo (el id)
                if (!validarEnteroPositivo($sede_id)) {
                    $errores["sede_id"] = "La sede seleccionada no es válida.";
                }

                // Si no hay errores, actualizamos los datos
                if (empty($errores)) {
                    $update = "UPDATE departamentos SET nombre = ?, presupuesto = ?, sede_id = ? WHERE id = ?";
                    $consulta = $conexion->prepare($update);

                    try {
                        $consulta->execute([$nombre, $presupuesto, $sede_id, $idDepartamento]);
                        $consulta = null;
                        $conexion = null;
                        header("Location: listado.php");
                        exit();
                    } catch (PDOException $e) {
                        exit($e->getMessage());
                    }
                }
            }
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $idDepartamento ?>">
            <p>
                <!-- Campo nombre del departamento -->
                <input type="text" name="nombre" placeholder="Departamento" value="<?php echo htmlspecialchars($nombre); ?>">
                <?php if (isset($errores["nombre"])): ?>
            <p class="error"><?php echo htmlspecialchars($errores["nombre"]); ?></p>
        <?php endif; ?>
        </p>
        <p>
            <!-- Campo presupuesto del departamento -->
            <input type="number" name="presupuesto" placeholder="Presupuesto" value="<?php echo htmlspecialchars($presupuesto); ?>">
            <?php if (isset($errores["presupuesto"])): ?>
        <p class="error"><?php echo htmlspecialchars($errores["presupuesto"]); ?></p>
    <?php endif; ?>
    </p>
    <p>
        <!-- Campo nombre de la sede -->
        <select id="sede" name="sede_id">
            <option value="">Seleccione Sede</option>
            <?php
            $resultado = $conexion->query("SELECT id, nombre FROM sedes");
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
            ?>
                <option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $sede_id ? "selected" : "" ?>>
                    <?php echo $row["nombre"]; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <?php if (isset($errores["sede_id"])): ?>
    <p class="error"><?php echo htmlspecialchars($errores["sede_id"]); ?></p>
<?php endif; ?>
</p>
<p>
    <!-- Botón submit -->
    <input type="submit" value="Guardar">
</p>
        </form>

        <div class="contenedor">
            <div class="enlaces">
                <a href="listado.php">Volver al listado de departamentos</a>
            </div>
        </div>
    </body>

</html>