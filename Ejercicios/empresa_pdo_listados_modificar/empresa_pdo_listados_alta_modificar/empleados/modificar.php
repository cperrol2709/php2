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
    <h1>Modificar empleado</h1>
    <?php
		// crea las variables para la comprobación de los datos y conectamos con la BBDD para obtener y pintar los datos de la id que acabamos de enviar a la página

		$errores = [];
		$idEmpleado = 0;
		$nombre = "";
		$email = "";
		$apellidos = "";
		$salario = "";
		$hijos = 0;
		$departamento_id = 0;
		$pais_id = 0;

    	    	
    	if (count($_REQUEST) > 0) 
    	{

    		if (isset($_GET["idEmpleado"])) 
    		{
				//Obtenemos los datos del empleado. Para ello
            	$idEmpleado = $_GET["idEmpleado"];
            	//Conectamos a la BBDD
				$conexion = conectarpdo($host, $user, $password, $bbdd);
        		// Montamos la consulta a ejecutar
				$select = "SELECT id,nombre,email,apellidos,salario,hijos,departamento_id,pais_id FROM empleados e WHERE e.id = ? ";
		        // prepararamos la consulta
				$consulta = $conexion->prepare($select);
		        // parámetro (usamos bindParam)
				$consulta->bindParam(1, $idEmpleado);
		        // ejecutamos la consulta 
				$consulta->execute();
		        // comprobamos si hay algún registro 
				if ($consulta->rowCount() == 0)
				{
					//Si no lo hay, desconectamos y volvemos al listado original
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}
				else 
				{
					// Si hay algún registro, Obtenemos el resultado (usamos fetch())
			        $registro = $consulta->fetch();
					$idEmpleado = $registro['id'];
					$nombre = $registro['nombre'];
					$email = $registro['email'];
					$apellidos = $registro['apellidos'];
					$salario = $registro['salario'];
					$hijos = $registro['hijos'];
					$departamento_id = $registro['departamento_id'];
					$pais_id = $registro['pais_id'];
					$consulta = null;
		        	$conexion = null;
				}
            } 
            else 
            {
				$comprobarValidacion = true;
				// Comenzamos la comprobación de los datos introducidos.
				// Creamos las variables con los requisitos de cada campo (función "obtenerValorCampo")
    			
					$lonNomEmpMin = 3;
					$lonNomEmpMax = 50;
					$lonApellEmpMin = 3;
					$lonApellEmpMax = 150;
					$longitudMaximaEmail = 120;
					$numHijosMin = 0;
					$numHijosMax = 10;

				
					$idEmpleado = obtenerValorCampo('id');
					$nombre = obtenerValorCampo('nombre');
					$email = obtenerValorCampo('email');
					$apellidos = obtenerValorCampo('apellidos');
					$salario = obtenerValorCampo('salario');
					$hijos = obtenerValorCampo('hijos');
					$departamento_id = obtenerValorCampo('departamento_id');
					$pais_id = obtenerValorCampo('pais_id');
			    
		    	//-----------------------------------------------------
		        // Validaciones
		        //-----------------------------------------------------
		        // Compruebo que el id del empleado se corresponde con uno que tengamos 
	        	//conectamos a la bbdd
				$conexion = conectarpdo($host, $user, $password, $bbdd);
	        	// preparamos la consulta SELECT a ejecutar
				$select = "SELECT id,nombre,email,apellidos,salario,hijos,departamento_id,pais_id FROM empleados e WHERE e.id = ? ";
				// preparamos la consulta (bindParam)
				$consulta = $conexion->prepare($select);
				// parámetro (usamos bindParam)
				$consulta->bindParam(1, $idEmpleado);
				// ejecutamos la consulta 
				$consulta->execute();

				// comprobamos si algún registro 
				if ($consulta->rowCount() == 0)
				{
					//Si no lo hay, desconectamos y volvemos al listado original
					$consulta = null;
       				$conexion = null;
				}
		        // Nombre del empleado: validamos la longitud. Si no es correcta, generamos el error.
		        if (!validarLongitudCadena($nombre, $lonNomEmpMin ,$lonNomEmpMax)) 
		        {
					//Generar msj de error
					$errores["nombre"] = 'El nombre del empleado no cumple los requisitos.';
        			$nombre = "";
		        }

		        // Apellidos del empleado: validamos la longitud. Si no es correcta, generamos el error.
		        if (!validarLongitudCadena($apellidos, $lonApellEmpMin ,$lonApellEmpMax)) 
		        {
					$errores["apellidos"] = 'Los apellidos del empleado no cumple los requisitos.';
        			$apellidos = "";
		        }

		        // Correo electrónico del empleado: validamos que sea un email (validarEmail) y la longitud máxima.
		        if (!validarEmail($email))
		        {
		            $errores["email"] = 'El email del empleado no cumple los requisitos.';
        			$email = "";
		        }
		        elseif (strlen($email)>$longitudMaximaEmail)
		        {
					$errores["email"] = 'El email del empleado supera la longitud maxima.';
        			$email = "";
		        }

		        // El número de hijos del empleado: validamos con validarEnteroLimites()
		        if (!validarEnteroLimites($hijos, $numHijosMin,$numHijosMax))
		        {
					$errores["hijos"] = 'El numero de hijos del empleado no cumple los requisitos.';
        			$hijos = "";		        }

		        // Salario del empleado: validamos que sea decimal positivo validarDecimalPositivo().
		        if (!validarDecimalPositivo($salario))
		        {
		            $errores["salario"] = 'El salario del empleado no cumple los requisitos.';
        			$hijos = "";
		        } 

		        // Nombre del departamento (el id): validamos con validarEnteroLimites()
		        if (!validarEnteroPositivo($idEmpleado))
		        {
		            $errores["id"] = 'El id del empleado no cumple los requisitos.';
        			$id = "";
		        }
		        

		        // Nacionalidad del empleado (el id): validamos con validarEnteroLimites()
		        if (!validarEnteroPositivo($nacionalidad))
		        {
		            $errores["id"] = 'El id del empleado no cumple los requisitos.';
        			$id = "";
		        }
		    }
    	}
  	?>

  	<?php
  		//Si hay errores, pintarlos en el correspondiente campo:
  
  	?>
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  			<input type="hidden" name="id" value="<?php echo $idEmpleado ?>">
	    	<p>
	            <!-- Campo nombre del empleado -->
	            <input type="text" name="nombre" placeholder="Nombre" value="<?php //pintamos nombre del empleado ?>">
	            <?php
	            	//Si hay error en el nombre...
	            ?>
	            	<p class="error"><?php //Pintamos el error en la sede ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo apellidos del empleado -->
	            <input type="text" name="apellidos" placeholder="Apellidos" value="<?php //pintamos apellidos del empleado ?>">
	            <?php
	            	if (isset($errores["apellidos"])):
	            ?>
	            	<p class="error"><?php //Pintamos el error en los apellidos ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo correo electrónico del empleado -->
	            <input type="text" name="email" placeholder="Correo electrónico" value="<?php //pintamos email del empleado ?>">
	            <?php
	            	if (isset($errores["email"])):
	            ?>
	            	<p class="error"><?php //Pintamos el error en el email ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo salario del empleado -->
	            <input type="number" step="0.01" name="salario" placeholder="Salario" value="<?php //pintamos salario del empleado ?>">
	            <?php
	            	if (isset($errores["salario"])):
	            ?>
	            	<p class="error"><?php //Pintamos el error en el salario ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo número de hijos del empleado -->
	            <input type="number" name="numeroHijos" placeholder="Número de hijos" value="<?php //pintamos hijos del empleado ?>">
	            <?php
	            	if (isset($errores["hijos"])):
	            ?>
	            	<p class="error"><?php //Pintamos el error en los hijos ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo nacionalidad del empleado -->
	            <select id="nacionalidad" name="nacionalidad">
	            	<option value="">Seleccione Nacionalidad</option>
	            <?php
				//nos conectamos a la bbdd y pintamos las diferentes nacionalidades en el desplegable, ordenado por nacionalidad.
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nacionalidad FROM paises ORDER BY nacionalidad";
	            	
	            	$resultado = resultadoConsulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $nacionalidad ? "selected" : "" ?>><?php echo $row["nacionalidad"]; ?></option>
  				<?php
  					endwhile;

  					$consulta = null;

        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	//Si hay error en la nacionalidad...
	            ?>
	            	<p class="error"><?php //Pintamos el error en la nacionalidad ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo departamento del empleado -->
	            <select id="departamento" name="departamento">
	            	<option value="">Seleccione Departamento</option>
	            <?php
				//nos conectamos a la bbdd y pintamos los diferentes departamentos en el desplegable, ordenado por el nombre del departamento.
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nombre FROM departamentos ORDER BY nombre";
	            	
	            	$resultado = resultadoConsulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $departamento ? "selected" : ""?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  					
  					$consulta = null;

        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	//Si hay error en el departamento...
	            ?>
	            	<p class="error"><?php //Pintamos el error en el departamento ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Botón submit -->
	            <input type="submit" value="Guadar">
	        </p>
	    </form>
  	<?php
  		//Si no hay errores:
		else:
  			//Nos conectamos a la BBDD
			
			// Creamos una variable con la consulta "UPDATE" a ejecutar
			
			// preparamos la consulta (bindParam)

			// ejecutamos la consulta 

			
			// ejecutar la consulta y mostramos el error
			try 
			{
				$consulta->execute();
			}
			catch (PDOException $exception)
			{
           		exit($exception->getMessage());
        	}

			$consulta = null;

        	$conexion = null;

        	// redireccionamos al listado de empleados
  			header("Location: listado.php");
  			
    	endif;
    ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de empleados</a>
        </div>
   	</div>
    
</body>
</html>