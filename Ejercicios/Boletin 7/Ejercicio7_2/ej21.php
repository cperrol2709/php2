<html>
<head><title>Ejemplos de PHP:</title></head>
<body>

<form action=ej22.php METHOD=POST>
    <?php
    // Verificamos si N es un número valido, mayor que 0 y menor que 11
    if (is_numeric($_POST["N"]) && $_POST["N"] > 0 && $_POST["N"] < 11) {
        $n = $_POST["N"]; // Asignamos el valor de N a la variable
        // Mostramos el numero de elementos de la matriz
        echo "<p>Número de elementos: $n x $n";
        echo "<br>Introduzca los elementos de la matriz: </br>";

        // Generamos con un for dentro de otro for los campos de entrada para cada elemento de la matriz
        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $n; $i++) {
                // Genera un input para cada celda de la matriz
                echo "<input type=text size=3 name=A[$j][$i]>";
            }
            echo "<p></p>"; 
        }

        // Creamos un menu desplegable para seleccionar una fila
        echo "<br>Selecciona una fila:  ";
        echo "<select name=fil>";
        for ($f = 0; $f < $n; $f++) {
            $F = $f + 1; // +1 para que empieze en 1 y no en 0
            echo "<option> $F </option>";
        }
        echo "</select>";

        // Creamos un menu desplegable para seleccionar una columna
        echo "<br>Selecciona una columna:   ";
        echo "<select name=col>";
        for ($c = 0; $c < $n; $c++) {
            $C = $c + 1; // +1 para que empieze en 1 y no en 0
            echo "<option> $C </option>";
        }
        echo "</select>";

        // Menú desplegable para seleccionar una trayectoria
        echo "<br>Introduzca la trayectoria: <select name=tr>
            <option value=1>Arriba</option>
            <option value=2>Arriba y a la derecha</option>
            <option value=3>A la derecha</option>
            <option value=4>Abajo y a la derecha</option>
            <option value=5>Abajo</option>
            <option value=6>Abajo y a la izquierda</option>
            <option value=7>A la izquierda</option>
            <option value=8>Arriba y la izquierda</option>
            </select> <br>";

        echo "<p></p>"; 

        // Boton para enviar el formulario
        echo "  <br><input name=Enviar type=submit value=\"Enviar\">";
        // Boton para borrar el formulario
        echo "  <input name=Borrar type=reset value=\"Borrar\"></br>";

        
        echo "<input type=\"hidden\" name=\"N\" value=\"$n\">";
    }   
    else {
        // Mostramos un mensaje de error si el valor de N no es valido
        echo "<p>El valor es incorrecto. Debe ser un número entero entre 1 y 10</p>";
    }
    ?>
</form>

 <p><a href="ej20.php">Volver al inicio.</a></p>
</form>
</body>
</html>