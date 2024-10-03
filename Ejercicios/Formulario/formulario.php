<form enctype="multipart/form-data" action="ejemplo.php" method="post">
    <p>Nombre: <input type="text" name="nombre" value="tu nombre"></p>
    <p>Apellidos: <input type="text" name="apellidos" value="tu apellido"></p>
    <p>Contraseña: <input type="password" name="contrasena" value="123456"></p>
    <p>Comentario:<br><textarea rows="4" cols="20" name="areatexto1">Escribe aquí tu comentario.</textarea></p>
    <p>Opción 1: <input type="checkbox" name="casilla1"></p>
    <p>Opción 2: <input type="checkbox" name="casilla2" value="activo"></p>
    <p>Selección:</p>
    <p>Sel1: <input type="radio" name="controlRadio" value="uno"></p>
    <p>Sel2: <input type="radio" name="controlRadio" value="dos"></p>
    <p>Menú:
        <select name="menu1">
            <option>Opción 1</option>
            <option value="dos">Opción 2</option>
        </select>
    </p>
    <p>Segundo menú:
        <select name="menu3[]" size="3" multiple>
            <option>Opción 1</option>
            <option>Opción 2</option>
            <option>Opción 3</option>
            <option>Opción 4</option>
        </select>
    </p>
    <p>Control oculto: <input type="hidden" name="oculto1" value="voculto"></p>
    <p>Enviar archivo: <input type="file" name="archivo"></p>

    <p>
        <input type="submit" value="Enviar" name="boton1">
    </p>
    <p>
        <button type="submit" value="Enviar2" name="boton2">Send</button>
    </p>
    <p>
        <input type="submit" name="respuesta" value="Sí">
        <input type="submit" name="respuesta" value="No">
    </p>
    <p><input type="image" name="gnu" src="logoGNU.png" alt="Logotipo GNU"></p>
</form>