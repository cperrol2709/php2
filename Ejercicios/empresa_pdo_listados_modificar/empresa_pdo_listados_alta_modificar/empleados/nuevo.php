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
    <h1>Alta de un nuevo empleado</h1>
    <?php
    // Variables para el formulario y validaciones
    $errores = [];
    $comprobarValidacion = false;
    $nombre = $apellidos = $email = $salario = $hijos = $nacionalidad = $departamento = "";
    $limiteInferiorHijos = 0;
    $limiteSuperiorHijos = 10;
    $longitudMinimaNombre = 3;
    $longitudMaximaNombre = 50;
    $longitudMinimaApellidos = 3;
    $longitudMaximaApellidos = 150;
    $longitudMaximaEmail = 120;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comprobarValidacion = true;

        // Obtenemos los valores del formulario
        $nombre = obtenerValorCampo("nombre");
        $apellidos = obtenerValorCampo("apellidos");
        $email = obtenerValorCampo("email");
        $salario = obtenerValorCampo("salario");
        $hijos = obtenerValorCampo("numeroHijos");
        $nacionalidad = obtenerValorCampo("nacionalidad");
        $departamento = obtenerValorCampo("departamento");

        // Validaciones
        if (!validarLongitudCadena($nombre, $longitudMinimaNombre, $longitudMaximaNombre)) {
            $errores["nombre"] = "El nombre no cumple con los requisitos de longitud.";
            $nombre = "";
        }
        if (!validarLongitudCadena($apellidos, $longitudMinimaApellidos, $longitudMaximaApellidos)) {
            $errores["apellidos"] = "Los apellidos no cumplen con los requisitos de longitud.";
            $apellidos = "";
        }
        if (!validarEmail($email) || strlen($email) > $longitudMaximaEmail) {
            $errores["email"] = "El email no es válido o excede la longitud máxima.";
            $email = "";
        }
        if (!validarEnteroLimites($hijos, $limiteInferiorHijos, $limiteSuperiorHijos)) {
            $errores["hijos"] = "El número de hijos debe estar entre $limiteInferiorHijos y $limiteSuperiorHijos.";
            $hijos = "";
        }
        if (!validarDecimalPositivo($salario)) {
            $errores["salario"] = "El salario debe ser un número positivo.";
            $salario = "";
        }
        if (!validarEnteroPositivo($departamento)) {
            $errores["departamento"] = "El departamento seleccionado no es válido.";
        }
        if (!validarEnteroPositivo($nacionalidad)) {
            $errores["nacionalidad"] = "La nacionalidad seleccionada no es válida.";
        }
    }
    ?>

    <?php if (!$comprobarValidacion || count($errores) > 0): ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <p>
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre); ?>">
                <?php if (isset($errores['nombre'])): ?>
                    <p class="error"><?php echo $errores["nombre"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo htmlspecialchars($apellidos); ?>">
                <?php if (isset($errores['apellidos'])): ?>
                    <p class="error"><?php echo $errores["apellidos"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <input type="text" name="email" placeholder="Correo electrónico" value="<?php echo htmlspecialchars($email); ?>">
                <?php if (isset($errores['email'])): ?>
                    <p class="error"><?php echo $errores["email"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <input type="number" step="0.01" name="salario" placeholder="Salario" value="<?php echo htmlspecialchars($salario); ?>">
                <?php if (isset($errores['salario'])): ?>
                    <p class="error"><?php echo $errores["salario"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <input type="number" name="numeroHijos" placeholder="Número de hijos" value="<?php echo htmlspecialchars($hijos); ?>">
                <?php if (isset($errores['hijos'])): ?>
                    <p class="error"><?php echo $errores["hijos"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <select id="nacionalidad" name="nacionalidad">
                    <option value="">Seleccione Nacionalidad</option>
                    <?php
                    try {
                        $conexion = conectarPDO($host, $user, $password, $bbdd);
                        $consulta = "SELECT id, nacionalidad FROM paises ORDER BY nacionalidad";
                        $resultado = $conexion->query($consulta);
                        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            $selected = $row["id"] == $nacionalidad ? "selected" : "";
                            echo "<option value='{$row["id"]}' $selected>{$row["nacionalidad"]}</option>";
                        }
                        $conexion = null;
                    } catch (Exception $e) {
                        echo "<p class='error'>Error al cargar nacionalidades: {$e->getMessage()}</p>";
                    }
                    ?>
                </select>
                <?php if (isset($errores['nacionalidad'])): ?>
                    <p class="error"><?php echo $errores["nacionalidad"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <select id="departamento" name="departamento">
                    <option value="">Seleccione Departamento</option>
                    <?php
                    try {
                        $conexion = conectarPDO($host, $user, $password, $bbdd);
                        $consulta = "SELECT id, nombre FROM departamentos ORDER BY nombre";
                        $resultado = $conexion->query($consulta);
                        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            $selected = $row["id"] == $departamento ? "selected" : "";
                            echo "<option value='{$row["id"]}' $selected>{$row["nombre"]}</option>";
                        }
                        $conexion = null;
                    } catch (Exception $e) {
                        echo "<p class='error'>Error al cargar departamentos: {$e->getMessage()}</p>";
                    }
                    ?>
                </select>
                <?php if (isset($errores['departamento'])): ?>
                    <p class="error"><?php echo $errores["departamento"]; ?></p>
                <?php endif; ?>
            </p>
            <p>
                <input type="submit" value="Guardar">
            </p>
        </form>
    <?php else: ?>
        <?php
        try {
            $conexion = conectarPDO($host, $user, $password, $bbdd);
            $insert = "INSERT INTO empleados (nombre, apellidos, email, salario, hijos, pais_id, departamento_id)
                       VALUES (:nombre, :apellidos, :email, :salario, :hijos, :pais_id, :departamento_id)";
            $consulta = $conexion->prepare($insert);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':salario', $salario);
            $consulta->bindParam(':hijos', $hijos, PDO::PARAM_INT);
            $consulta->bindParam(':pais_id', $nacionalidad, PDO::PARAM_INT);
            $consulta->bindParam(':departamento_id', $departamento, PDO::PARAM_INT);
            $consulta->execute();
            header("Location: listado.php");
            exit;
        } catch (Exception $e) {
            echo "<p class='error'>Error al guardar: {$e->getMessage()}</p>";
        }
        ?>
    <?php endif; ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de empleados</a>
        </div>
    </div>
</body>
</html>
