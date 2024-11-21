<?php
require_once("../utiles/funciones.php");
require_once("../utiles/variables.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta nuevo departamento</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
	<h1>Alta de un nuevo departamento</h1>
	<?php
	// Variables iniciales
	$errores = [];
	$comprobarValidacion = false;
	$departamento = "";
	$presupuesto = "";
	$sede = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$comprobarValidacion = true;

		// Requisitos de validación
		$lonDepMin = 3;
		$lonDepMax = 100;

		// Obtener valores de los campos
		$departamento = obtenerValorCampo("nombre");
		$presupuesto = obtenerValorCampo("presupuesto");
		$sede = obtenerValorCampo("sede");

		// Validación del nombre del departamento
		if (!validarLongitudCadena($departamento, $lonDepMin, $lonDepMax)) {
			$errores["nombre"] = 'El nombre del departamento no cumple los requisitos';
			$departamento = "";
		} else {
			// Verificar si el departamento ya existe
			$conexion = conectarPDO($host, $user, $password, $bbdd);
			$query = "SELECT COUNT(*) FROM departamentos WHERE nombre = :nombre";
			$stmt = $conexion->prepare($query);
			$stmt->bindParam(':nombre', $departamento);
			$stmt->execute();
			$existe = $stmt->fetchColumn();

			if ($existe > 0) {
				$errores["nombre"] = "El nombre del departamento ya existe";
			}
		}

		// Validación del presupuesto
		if (!validarEnteroPositivo($presupuesto)) {
			$errores["presupuesto"] = "El presupuesto debe ser un entero positivo";
			$presupuesto = "";
		}

		// Validación de la sede
		if (!validarEnteroPositivo($sede)) {
			$errores["sede"] = "Debe seleccionar una sede válida";
			$sede = "";
		}
	}
	?>

	<?php
	// Si hay errores o no se ha enviado el formulario correctamente
	if (!$comprobarValidacion || count($errores) > 0):
	?>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<p>
				<!-- Campo nombre del departamento -->
				<input type="text" name="nombre" placeholder="Departamento" value="<?php echo $departamento; ?>">
				<?php if (isset($errores['nombre'])): ?>
					<p class="error"><?php echo $errores["nombre"]; ?></p>
				<?php endif; ?>
			</p>
			<p>
				<!-- Campo presupuesto del departamento -->
				<input type="number" name="presupuesto" placeholder="Presupuesto" value="<?php echo $presupuesto; ?>">
				<?php if (isset($errores['presupuesto'])): ?>
					<p class="error"><?php echo $errores["presupuesto"]; ?></p>
				<?php endif; ?>
			</p>
			<p>
				<!-- Campo nombre de la sede -->
				<select id="sede" name="sede">
					<option value="">Seleccione Sede</option>
					<?php
					try {
						$conexion = conectarPDO($host, $user, $password, $bbdd);
						$consulta = "SELECT id, nombre FROM sedes";
						$resultado = $conexion->query($consulta);

						while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
							<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $sede ? "selected" : ""; ?>>
								<?php echo $row["nombre"]; ?>
							</option>
						<?php endwhile;

						$resultado = null;
						$conexion = null;
					} catch (Exception $e) {
						echo "<p class='error'>Error al cargar las sedes: " . $e->getMessage() . "</p>";
					}
					?>
				</select>
				<?php if (isset($errores['sede'])): ?>
					<p class="error"><?php echo $errores["sede"]; ?></p>
				<?php endif; ?>
			</p>
			<p>
				<!-- Botón submit -->
				<input type="submit" value="Guardar">
			</p>
		</form>
	<?php else:
		$conexion = conectarPDO($host, $user, $password, $bbdd);

		// Consulta a ejecutar
		$insert = "INSERT INTO departamentos (nombre, presupuesto, sede_id) VALUES (:nombre, :presupuesto, :sede)";

		// Preparar la consulta
		$consulta = $conexion->prepare($insert);

		// Asignar valores a los parámetros
		$consulta->bindParam(':nombre', $departamento);
		$consulta->bindParam(':presupuesto', $presupuesto, PDO::PARAM_INT);
		$consulta->bindParam(':sede', $sede, PDO::PARAM_INT);

		// Ejecutar la consulta
		$consulta->execute();

		// Redireccionamos al listado de departamentos
		header("Location: listado.php");
		exit;
	endif;
	?>

	<div class="contenedor">
		<div class="enlaces">
			<a href="listado.php">Volver al listado de departamentos</a>
		</div>
	</div>
</body>

</html>
