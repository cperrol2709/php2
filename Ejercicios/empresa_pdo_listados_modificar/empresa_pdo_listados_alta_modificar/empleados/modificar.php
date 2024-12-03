<?php
// Se incluyen las variables y funciones necesarias para la conexión y validaciones.
require_once("../utiles/variables.php");
require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar empleado</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Modificar empleado</h1>
    <?php
    // Se inicializa el array de errores y se recupera el ID del empleado desde GET, si está disponible.
    $errores = [];
    $idEmpleado = $_GET["idEmpleado"] ?? null;

    // Conexión a la base de datos.
    $conexion = conectarPDO($host, $user, $password, $bbdd);

    // Si el formulario se carga por primera vez con el método GET y un ID válido.
    if ($_SERVER["REQUEST_METHOD"] === "GET" && $idEmpleado) {
        // Consulta para obtener los datos del empleado según su ID.
        $consulta = "SELECT * FROM empleados WHERE id = :idEmpleado";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
        $stmt->execute();

        // Si no se encuentra el empleado, se muestra un mensaje de error y se detiene la ejecución.
        if ($stmt->rowCount() === 0) {
            echo "<p class='error'>No existe un empleado con esa ID.</p>";
            exit;
        }

        // Se obtienen los datos del empleado para rellenar el formulario.
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Si el formulario se envía con POST, se recogen los valores del formulario.
        $idEmpleado = $_POST["id"];
        $nombre = $_POST["nombre"] ?? "";
        $apellidos = $_POST["apellidos"] ?? "";
        $email = $_POST["email"] ?? "";
        $salario = $_POST["salario"] ?? 0;
        $numeroHijos = $_POST["numeroHijos"] ?? 0;
        $nacionalidad = $_POST["nacionalidad"] ?? null;
        $departamento = $_POST["departamento"] ?? null;

        // *** Validaciones ***
        // Validación de longitud del nombre.
        if (!validarLongitudCadena($nombre, 3, 50)) {
            $errores["nombre"] = "El nombre debe tener entre 3 y 50 caracteres.";
        }
        // Validación de longitud de los apellidos.
        if (!validarLongitudCadena($apellidos, 3, 150)) {
            $errores["apellidos"] = "Los apellidos deben tener entre 3 y 150 caracteres.";
        }
        // Validación del formato de correo electrónico.
        if (!validarEmail($email)) {
            $errores["email"] = "El correo electrónico no es válido.";
        }
        // Validación de que el salario sea un número positivo.
        if (!validarDecimalPositivo($salario)) {
            $errores["salario"] = "El salario debe ser un número positivo.";
        }
        // Validación de que el número de hijos esté entre 0 y 10.
        if (!validarEnteroLimites($numeroHijos, 0, 10)) {
            $errores["hijos"] = "El número de hijos debe estar entre 0 y 10.";
        }
        // Validación de nacionalidad válida.
        if (!validarEnteroPositivo($nacionalidad)) {
            $errores["nacionalidad"] = "Seleccione una nacionalidad válida.";
        }
        // Validación de departamento válido.
        if (!validarEnteroPositivo($departamento)) {
            $errores["departamento"] = "Seleccione un departamento válido.";
        }

        // Si no hay errores, se actualizan los datos en la base de datos.
        if (empty($errores)) {
            $consulta = "UPDATE empleados SET nombre = :nombre, apellidos = :apellidos, email = :email,
                salario = :salario, hijos = :hijos, pais_id = :nacionalidad, departamento_id = :departamento WHERE id = :idEmpleado";
            $stmt = $conexion->prepare($consulta);

            // Se vinculan los parámetros a la consulta.
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellidos", $apellidos);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":salario", $salario);
            $stmt->bindParam(":hijos", $numeroHijos);
            $stmt->bindParam(":nacionalidad", $nacionalidad);
            $stmt->bindParam(":departamento", $departamento);
            $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);

            // Si la consulta se ejecuta correctamente, redirige al listado.
            if ($stmt->execute()) {
                header("Location: listado.php");
                exit;
            } else {
                // Si falla la consulta, muestra un mensaje de error.
                echo "<p class='error'>Error al actualizar el empleado.</p>";
            }
        }
    }
    ?>
    <!-- Formulario para editar los datos del empleado -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $idEmpleado; ?>">
        <!-- Campo para el nombre -->
        <p>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($empleado['nombre'] ?? ''); ?>">
            <?php if (isset($errores["nombre"])): ?><span class="error"><?php echo $errores["nombre"]; ?></span><?php endif; ?>
        </p>
        <!-- Campo para los apellidos -->
        <p>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo htmlspecialchars($empleado['apellidos'] ?? ''); ?>">
            <?php if (isset($errores["apellidos"])): ?><span class="error"><?php echo $errores["apellidos"]; ?></span><?php endif; ?>
        </p>
        <!-- Campo para el correo electrónico -->
        <p>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($empleado['email'] ?? ''); ?>">
            <?php if (isset($errores["email"])): ?><span class="error"><?php echo $errores["email"]; ?></span><?php endif; ?>
        </p>
        <!-- Campo para el salario -->
        <p>
            <label>Salario:</label>
            <input type="number" step="0.01" name="salario" value="<?php echo htmlspecialchars($empleado['salario'] ?? ''); ?>">
            <?php if (isset($errores["salario"])): ?><span class="error"><?php echo $errores["salario"]; ?></span><?php endif; ?>
        </p>
        <!-- Campo para el número de hijos -->
        <p>
            <label>Hijos:</label>
            <input type="number" name="numeroHijos" value="<?php echo htmlspecialchars($empleado['hijos'] ?? ''); ?>">
            <?php if (isset($errores["hijos"])): ?><span class="error"><?php echo $errores["hijos"]; ?></span><?php endif; ?>
        </p>
        <!-- Selección de nacionalidad -->
        <p>
            <label>Nacionalidad:</label>
            <select name="nacionalidad">
                <option value="">Seleccione</option>
                <?php
                // Consulta para obtener los países.
                $consulta = "SELECT id, nacionalidad FROM paises";
                $resultado = resultadoConsulta($conexion, $consulta);
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($row["id"] == ($empleado["pais_id"] ?? "")) ? "selected" : "";
                    echo "<option value='{$row["id"]}' $selected>{$row["nacionalidad"]}</option>";
                }
                ?>
            </select>
            <?php if (isset($errores["nacionalidad"])): ?><span class="error"><?php echo $errores["nacionalidad"]; ?></span><?php endif; ?>
        </p>
        <!-- Selección de departamento -->
        <p>
            <label>Departamento:</label>
            <select name="departamento">
                <option value="">Seleccione</option>
                <?php
                // Consulta para obtener los departamentos.
                $consulta = "SELECT id, nombre FROM departamentos";
                $resultado = resultadoConsulta($conexion, $consulta);
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($row["id"] == ($empleado["departamento_id"] ?? "")) ? "selected" : "";
                    echo "<option value='{$row["id"]}' $selected>{$row["nombre"]}</option>";
                }
                ?>
            </select>
            <?php if (isset($errores["departamento"])): ?><span class="error"><?php echo $errores["departamento"]; ?></span><?php endif; ?>
        </p>
        <!-- Botón para guardar -->
        <p><button type="submit">Guardar</button></p>
    </form>
    <!-- Enlace para volver al listado -->
    <a href="listado.php">Volver al listado</a>
</body>
</html>
