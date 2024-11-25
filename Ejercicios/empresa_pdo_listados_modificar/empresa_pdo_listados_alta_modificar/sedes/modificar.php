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
    <title>Modificar una sede</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Modificar una sede</h1>
    <?php
		// crea las variables para la comprobación de los datos y conectamos con la BBDD para obtener y pintar los datos de la id que acabamos de enviar a la página
    	
    	
    	if (count($_REQUEST) > 0)
    	{
		    if (isset($_GET["idSede"]))
		    {
            	$idSede = $_GET["idSede"];
          
            	//Conectamos a la BBDD

				$conexion = conectarpdo($host,$user,$password,$bbdd);
            
        		// Montamos la consulta a ejecutar

				$select = "SELECT nombre , direccion FROM sedes s WHERE s.id = ? ";
        	
		        // prepararamos la consulta

				$consulta = $conexion->prepare($select);
			
		        // parámetro (usamos bindParam)

				$consulta->bindParam($select);
		    
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

        		// Obtenemos el campo del nombre de la sede y dirección
			   
			    
			    //-----------------------------------------------------
		        // Validaciones
		        //-----------------------------------------------------
				// Comprueba que el id de la sede se corresponde con una que tengamos 
				//conectamos a la bbdd

				$conexion = conectarpdo($host,$user,$password,$bbdd);

	        	// preparamos la consulta SELECT a ejecutar

				$select = "SELECT nombre , direccion FROM sedes s WHERE s.id = ? ";

				// preparamos la consulta (bindParam)

				$consulta = $conexion->prepare($select);

				// ejecutamos la consulta 

				// comprobamos si algún registro 
				if ($consulta->rowCount() == 0)
				{
					//Si no lo hay, desconectamos y volvemos al listado original
				}
			
		        // Nombre de la sede: validamos la longitud. Si no es correcta, generamos el error.
		        if (!validarLongitudCadena($sede, $ ,$)) 
		        {
					//Generar msj de error
		        }
		        // Dirección de la sede: validamos la longitud. Si no es correcta, generamos el error.
		        if (!validarLongitudCadena($, $, $)) 
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
  			<input type="hidden" name="id" value="<?php echo $idSede ?>">
	    	<p>
	            <!-- Campo nombre de la sede -->
	            <input type="text" name="nombre" placeholder="Sede" value="<?php //pintamos la sede ?>">
	            <?php
	            	//Si hay error en la sede...
				
	            ?>
	            	<p class="error"><?php //Pintamos el error en la sede ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo dirección de la sede -->
	            <input type="text" name="direccion" placeholder="Dirección" value="<?php //pintamos la dirección ?>">
	            <?php
	            	//Si hay error en la dirección...
	            ?>
	            	<p class="error"><?php //Pintamos el error en la dirección ?></p>
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

		if($comprobarValidacion && count($errores) == 0):
		
  			//Nos conectamos a la BBDD

			$conexion = conectarpdo($host,$user,$password,$bbdd);
						
			// Creamos una variable con la consulta "UPDATE" a ejecutar
			
			// preparamos la consulta (bindParam)

			// ejecutamos la consulta 

        	// redireccionamos al listado de sedes
  			header("Location: listado.php");
  			
    	endif;
    ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de sedes</a>
        </div>
   	</div>
    
</body>
</html>