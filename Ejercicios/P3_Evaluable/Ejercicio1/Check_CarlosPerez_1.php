<?php
// Función para calcular la letra del DNI
function calcularLetraDNI($dni)
{
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; //Definimos una variable con todas las letras posibles del dni
    return $letras[$dni % 23]; //Obtenemos el resto de dividir el DNI entre 23
}

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $dni = $_GET['dni']; //Obtenemos el DNI

    //Comprobamos si el dni es nulo
    if ($dni === '') {
        echo "El DNI es obligatorio.";
        exit; // Salimos si no se ha enviado el DNI
    }

    // Recogemos los otros datos
    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $letra = strtoupper($_GET['Letra']);
    $email = $_GET['email'];

    // Verificamos que todos los campos están completos
    if (empty($nombre) || empty($apellidos) || empty($letra) || empty($email)) {
        echo "<p>Por favor, rellena todos los campos.</p>";
        exit;
    }

    // Verificación del formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>El formato del email no es correcto.</p>";
        exit;
    }

    // Verificación de la letra del DNI
    $letraCorrecta = calcularLetraDNI($dni);
    if ($letra !== $letraCorrecta) {
        echo "<p>La letra del DNI es incorrecta. Se corregira automaticamente.</p>";
        $letra = $letraCorrecta;
    }

    // Formateamos el DNI para mostrarlo como queremos
    $dniFormateado = $dni . $letra;

    //Mostramos la informacion
    echo "<div style='border: 2px solid #000; padding: 10px; width: 300px;'>";
    echo "<p><strong>Tus datos son:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Nombre y Apellidos:</strong> $nombre $apellidos</li>";
    echo "<li><strong>DNI:</strong> $dniFormateado</li>";
    echo "<li><strong>Email:</strong> $email</li>";
    echo "</ul>";
    echo "<p><a href='Index_CarlosPerez_1.php'>Volver al formulario.</a></p>";
    echo "</div>";
} else {
    echo "<p>Por favor, envía el formulario.</p>";
}
?>
