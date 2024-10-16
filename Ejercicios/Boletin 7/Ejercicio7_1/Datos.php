<?php
// Captura el valor enviado desde el formulario anterior
$numero = $_POST["numero"];

if ($numero >= 1 && $numero <= 10) {

    echo "<p>Número de elementos: $numero.</p>";
?>
    <body>
        <!-- Formulario para ingresar los elementos -->
        <form action="Resultado.php" method="post">
            <p>Introduzca los elementos a tratar:</p>
            <?php
            // Crea un campo de texto por cada número de elementos especificado
            for ($i = 1; $i <= $numero; $i++) {
                // Cada campo de texto se nombra como un array para facilitar el manejo de datos
                echo "<input type='text' name='elemento[]' required style='width: 50px;'>";
            }
            ?>
            <p>

                <input type="submit" value="Enviar">

                &nbsp;

                <button type="reset" value="Borrar" name="boton2">Borrar</button>
            </p>
        </form>
    </body>

<?php
} else {
    echo "<p>El valor es incorrecto. Debe ser un número entero entre 1 y 10.</p>";
    echo "<p><a href='Index.php'>Volver al formulario</a></p>";
}
?>