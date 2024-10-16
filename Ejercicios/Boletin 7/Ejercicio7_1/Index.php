Crea un programa de tres páginas con las siguientes funciones:
1. Una primera página con un formulario que nos pida un número de elementos:

    <form enctype="multipart/form-data" action="Datos.php" method="post">
    <!-- Párrafo que contiene el texto de instrucciones y el campo de entrada -->
    <p>
        Introduzca el numero de elementos: 
        <!-- Campo de entrada para que el usuario introduzca un número -->
        <input type="text" name="numero" value="">
    </p>

    <p>
        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Enviar">
        
        <!-- Espacio adicional -->
        &nbsp;

        <!-- Botón para restablecer el formulario a su estado original -->
        <button type="reset" value="Borrar" name="boton2">Borrar</button>
    </p>
</form>
