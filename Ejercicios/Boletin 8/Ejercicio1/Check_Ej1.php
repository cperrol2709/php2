<?php
session_start(); // Inicia una nueva sesion o reanuda una existente

// Inicializamos variables de error y datos
$email_error = ''; 
$edad_error = ''; 
$comprobacion = true;

// Comprobamos si el formulario ha sido enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar si el email es correcto
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_error = "No ha escrito su correo electrónico correctamente. Por favor, revíselo."; 
        $comprobacion = false; 
    } else {
        $email = $_POST['email']; // Guardamos el email si es valido
    }

    // Validar si la edad es correcta
    if (empty($_POST['edad']) || $_POST['edad'] < 18 || $_POST['edad'] > 65) {
        $edad_error = "La edad no está entre 18 y 65 años. Por favor, revíselo."; 
        $comprobacion = false; 
    } else {
        $edad = $_POST['edad']; // Guardamos la edad si es valida
    }

    // Si no hay errores, redirigimos a otra pagina
    if ($comprobacion) {
        $_SESSION['email'] = $email; // Guardamos el email en la sesion
        $_SESSION['edad'] = $edad; // Guardamos la edad en la sesion
        header("Location: Ficha_Ej1.php"); // Redirigimos a la pagina de ficha
        exit; 
    } else {
        // Si hay errores, mostramos el formulario de nuevo con los errores
        echo "<div style='border: 1px solid #000; padding: 10px; width: 600px;'>"; 
        echo "<h1>Introduzca los datos</h1>"; 
        echo "<form action='Check_Ej1.php' method='post'>"; 

       
        echo "<table>";
        echo "<tr><td>Correo electrónico:</td>";
        echo "<td><input type='text' name='email' size='60' maxlength='60' value='" . $_POST['email'] . "'></td></tr>";
        
        // Si hay un error de email, lo mostramos
        if (!empty($email_error)) {
            echo "<tr><td colspan='2'>$email_error</td></tr>"; // Mensaje de error del email
        }

        
        echo "<tr><td>Indique su edad:</td>";
        echo "<td><input type='number' name='edad' size='20' maxlength='60' value='" . htmlspecialchars($_POST['edad']) . "'></td></tr>";
        
        // Si hay un error de edad, lo mostramos
        if (!empty($edad_error)) {
            echo "<tr><td colspan='2'>$edad_error</td></tr>"; 
        }

        echo "</table>"; 
        echo "<p><input type='submit' value='Enviar'><input type='reset' value='Borrar'></p>"; 
        echo "</form></div>"; 
    }
}
?>
