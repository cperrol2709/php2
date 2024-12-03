<?php
    require_once("../utiles/variables.php");
    require_once("../utiles/funciones.php");

	//Si se ha seleccionado un registro para borrar
    if (count($_REQUEST) > 0)
    {

        if (isset($_GET["idEmpleado"]))
        {
            //Declarar la variable para la sedeque tomará el valor del $_GET, conectar a la BBDD, definir la consulta a ejecutar (DELETE), 
            //preparar la consulta (bindParam) y ejecutarla
            $idSede = $_GET["idEmpleado"];

            $conexion = conectarpdo($host, $user, $password, $bbdd);

            $delete = "DELETE FROM empleados WHERE id = ?";
            
            $consulta = $conexion->prepare($delete);
            
            $consulta->bindParam(1, $idSede, PDO::PARAM_INT);
            
            $resultado = $consulta->execute();

            //Si todo ha ido bien, mostrar mensaje
            if ($resultado) 
            {          
                header("refresh:3;url=listado.php");
                echo "Empleado eliminado correctamente. Redirigiendo al listado...";     
            } 
            //Si no ha ido bien, mostrar mensaje 
            else 
            {
                header("refresh:3;url=listado.php");
                echo "Hubo un error al eliminar el empleado. Redirigiendo al listado...";
            }
        	
	    	//En ambos casos, redireccionar al listado original tras 3 segundos.
            $consulta = null;
            $conexion = null;
	    } 
	} 
	    //Evitar que se pueda entrar directamente a la página .../borrar.php, redireccionando en tal caso a la página del listado
	else 
	{
        header("Location: listado.php");
        exit();
	}
?>