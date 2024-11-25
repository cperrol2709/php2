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

    	    	
    	if (count($_REQUEST) > 0) 
    	{
    		if (isset($_GET["idDepartamento"])) 
    		{
            	$idDepartamento = $_GET["idDepartamento"];

            	//Conectamos a la BBDD
            
        		// Montamos la consulta a ejecutar
        	
		        // prepararamos la consulta
			
		        // parámetro (usamos bindParam)
		    
		        // ejecutamos la consulta 

		        // comprobamos si hay algún registro 
				if ($consulta->rowCount() == 0)
				{
					//Si no lo hay, desconectamos y volvemos al listado original
				}
				else 
				{
					// Si hay algún registro, Obtenemos el resultado (usamos fetch())
				}
            } 
            else 
            {
		    	// Comenzamos la comprobación de los datos introducidos.
				// Creamos las variables con los requisitos de cada campo

			    
			    // Obtenemos el campo del departamento, presupuesto y sede
			    
			 

				 //-----------------------------------------------------
		        // Validaciones
		        //-----------------------------------------------------
				// Comprueba que el id del departamento se corresponde con uno que tengamos 
				//conectamos a la bbdd

	        	// preparamos la consulta SELECT a ejecutar

				// preparamos la consulta (bindParam)

				// ejecutamos la consulta 

				// comprobamos si algún registro 
				if ($consulta->rowCount() == 0)
				{
					//Si no lo hay, desconectamos y volvemos al listado original
				}

		        // Nombre del departamento: validamos la longitud. Si no es correcta, generamos el error.
		        if (!validarLongitudCadena($, $ ,$)) 
		        {

		        } 
		        else 
		        {
		        	// Comprobar que no exita un departamento con ese nombre.
					//Para ello, te conectas a la bbdd, ejecutas un SELECT y comprueba si hay ya un departamento con ese nombre.
		        	
					// comprobamos si, al ejecutar la consulta, tenemos más de un registro. En tal caso, generar el mensaje de error.
					if ($consulta->rowCount() > 0)
					{
						//Msj Error
					}
					
		        }

		        // Presupuesto del departamento: Validamos que sea entero positivo.
		        if (!validarEnteroPositivo($)) 
		        {
		            //Generar msj de error
		        } 

		        // Nombre de la sede: : Validamos que sea entero positivo (el id)
		        if (!validarEnteroPositivo($sede))
		        {
					//Generar msj de error
		        }
		        
		       
			}
		    
    	} 
    	
  	?>

  	<?php
  		//Si hay errores, pintarlos en el correspondiente campo:
  
  	?>
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    	<input type="hidden" name="id" value="<?php echo $idDepartamento ?>">
	    	<p>
	            <!-- Campo nombre del departamento -->
	            <input type="text" name="nombre" placeholder="Departamento" value="<?php //pintamos el departamento ?>">
	            <?php
	            	//Si hay error en el departamento...
	            ?>
	            	<p class="error"><?php //pintamos el error del departamento ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo presupuesto del departamento -->
	            <input type="number" name="presupuesto" placeholder="Presupuesto" value="<?php //Pintamos el presupuesto ?>">
	            <?php
	            	//Si hay error en el presupuesto
	            ?>
	            	<p class="error"><?php //Pintamos el error en el presupuesto ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo nombre de la sede -->
	            <select id="sede" name="sede">
	            	<option value="">Seleccione Sede</option>
	            <?php
	            	//Conectamos a la bbdd y hacemos un SELECT de las sedes para que aparezca en el desplegable del formulario.

  					// Terminamos usando:
					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>"  <?php echo $row["id"] == $sede ? "selected" : "" ?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  				
  				?>
  				</select>
  				
	            <?php
	            	//Si hay error en la sede...
	            ?>
	            	<p class="error"><?php //Pintar el error en la sede ?></p>
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
		// Si no hay errores
  		else:
  			//Nos conectamos a la BBDD
			
			// Creamos una variable con la consulta "UPDATE" a ejecutar
			
			// preparamos la consulta (bindParam)

			// ejecutamos la consulta 
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

        	// redireccionamos al listado de departamentos
  			header("Location: listado.php");
  			
    	endif;
    ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de departamentos</a>
        </div>
   	</div>
    
</body>
</html>