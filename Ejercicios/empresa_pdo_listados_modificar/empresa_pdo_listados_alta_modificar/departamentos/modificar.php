<?php
require_once("../utiles/variables.php");
require_once("../utiles/funciones.php");

$errores = [];
$idDepartamento = 0;
$nombre = "";
$presupuesto = 0;
$sede_id = 0;

$conexion = conectarpdo($host, $user, $password, $bbdd);

// Obtenemos los datos del departamento si se envió el `idDepartamento`
if (isset($_GET["idDepartamento"])) {
    $idDepartamento = $_GET["idDepartamento"];

    // Validar que `idDepartamento` sea numérico
    if (!is_numeric($idDepartamento)) {
        header("Location: listado.php");
        exit();
    }

    // Consultar los datos del departamento
    $query = "SELECT id, nombre, presupuesto, sede_id FROM departamentos WHERE id = ?";
    $consulta = $conexion->prepare($query);
    $consulta->execute([$idDepartamento]);

    if ($consulta->rowCount() === 0) {
        // Si no se encuentra, redirigir al listado
        header("Location: listado.php");
        exit();
    } else {
        $registro = $consulta->fetch(PDO::FETCH_ASSOC);
        $nombre = $registro['nombre'];
        $presupuesto = $registro['presupuesto'];
        $sede_id = $registro['sede_id'];
    }
}

// Procesar el formulario si se envían datos por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idDepartamento = obtenerValorCampo("id");
    $nombre = obtenerValorCampo("nombre");
    $presupuesto = obtenerValorCampo("presupuesto");
    $sede_id = obtenerValorCampo("sede_id");

    // Validar nombre
    $lonDepMin = 3;
    $lonDepMax = 100;
    if (!validarLongitudCadena($nombre, $lonDepMin, $lonDepMax)) {
        $errores["nombre"] = "El nombre del departamento no cumple los requisitos.";
    } else {
        $query = "SELECT id FROM departamentos WHERE nombre = ? AND id != ?";
        $consulta = $conexion->prepare($query);
        $consulta->execute([$nombre, $idDepartamento]);

        if ($consulta->rowCount() > 0) {
            $errores["nombre"] = "Ya existe un departamento con este nombre.";
        }
    }

    // Validar presupuesto
    if (!validarEnteroPositivo($presupuesto)) {
        $errores["presupuesto"] = "El presupuesto no cumple los requisitos.";
    }

    // Validar sede_id
    if (!validarEnteroPositivo($sede_id)) {
        $errores["sede_id"] = "El nombre de la sede no cumple los requisitos.";
    }

    // Si no hay errores, actualizamos la información
    if (empty($errores)) {
        $update = "UPDATE departamentos SET nombre = ?, presupuesto = ?, sede_id = ? WHERE id = ?";
        $consulta = $conexion->prepare($update);

        try {
            $consulta->execute([$nombre, $presupuesto, $sede_id, $idDepartamento]);
            header("Location: listado.php");
            exit();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar departamento</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Modificar departamento</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($idDepartamento); ?>">

        <p>
            <!-- Campo nombre del departamento -->
            <label for="nombre">Nombre del Departamento:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
            <?php if (isset($errores["nombre"])): ?>
                <p class="error"><?php echo htmlspecialchars($errores["nombre"]); ?></p>
            <?php endif; ?>
        </p>

        <p>
            <!-- Campo presupuesto del departamento -->
            <label for="presupuesto">Presupuesto:</label>
            <input type="number" id="presupuesto" name="presupuesto" value="<?php echo htmlspecialchars($presupuesto); ?>" required>
            <?php if (isset($errores["presupuesto"])): ?>
                <p class="error"><?php echo htmlspecialchars($errores["presupuesto"]); ?></p>
            <?php endif; ?>
        </p>

        <p>
	<!-- Campo sede -->
	<label for="sede">Sede:</label>
	<select id="sede" name="sede_id">
		<option value="0">Seleccione Sede</option>
		<?php
		// Obtener las sedes desde la base de datos
		$query = "SELECT id, nombre FROM sedes";
		$resultado = $conexion->query($query);
		while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
			<option value="<?php echo htmlspecialchars($row['id']); ?>"
				<?php echo ($row['id'] == $sede_id) ? "selected" : ""; ?>>
				<?php echo htmlspecialchars($row['nombre']); ?>
			</option>
		<?php endwhile; ?>
	</select>
	<?php if (!empty($errores["sede_id"])): ?>
<p class="error"><?php echo htmlspecialchars($errores["sede_id"]); ?></p>
<?php endif; ?>

</p>

        <p>
            <button type="submit">Guardar</button>
        </p>
    </form>

    <div class="contenedor">
        <a href="listado.php">Volver al listado de departamentos</a>
    </div>
</body>
</html>
