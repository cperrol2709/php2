<?php
    require_once("../utiles/variables.php");
    require_once("../utiles/funciones.php");

    // Si se ha seleccionado un registro para borrar
    if (count($_REQUEST) > 0)
    {

        if (isset($_GET["idSede"]))
        {
            // Obtener el ID de la sede desde el parámetro GET
            $idSede = $_GET["idSede"];

            // Conectamos a la base de datos
            $conexion = conectarpdo($host, $user, $password, $bbdd);
            
            // Definir la consulta DELETE
            $deleteQuery = "DELETE FROM sedes WHERE id = ?";
            
            // Preparamos la consulta
            $consulta = $conexion->prepare($deleteQuery);
            
            // Vinculamos el parámetro para la consulta
            $consulta->bindParam(1, $idSede, PDO::PARAM_INT);
            
            // Ejecutamos la consulta
            $resultado = $consulta->execute();
            
            // Si la eliminación es exitosa
            if ($resultado) {
                // Redirigimos al listado de sedes después de 3 segundos
                header("refresh:3;url=listado.php");
                echo "Sede eliminada correctamente. Redirigiendo al listado...";
            } 
            else {
                // Si la eliminación falla, mostramos un mensaje de error
                header("refresh:3;url=listado.php");
                echo "Hubo un error al eliminar la sede. Redirigiendo al listado...";
            }

            // Liberar recursos y cerrar conexión
            $consulta = null;
            $conexion = null;
        } 
        
    } 
    // Si no se ha enviado el idSede, redirigimos al listado
    else {
        header("Location: listado.php");
        exit();
    }
?>
