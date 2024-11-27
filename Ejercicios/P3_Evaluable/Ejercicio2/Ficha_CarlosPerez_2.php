<?php

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Usamos isset() para verificar si las variables han sido enviadas, y si no, asignamos null por defecto
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
    $apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : null;
    $edad = isset($_GET['edad']) ? $_GET['edad'] : null;
    $peso = isset($_GET['peso']) ? $_GET['peso'] : null;
    $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
    $estadoCivil = isset($_GET['estadoCivil']) ? $_GET['estadoCivil'] : null;

    $cine = isset($_GET['cine']) ? $_GET['cine'] : null;
    $lectura = isset($_GET['lectura']) ? $_GET['lectura'] : null;
    $television = isset($_GET['television']) ? $_GET['television'] : null;
    $deporte = isset($_GET['deporte']) ? $_GET['deporte'] : null;
    $musica = isset($_GET['musica']) ? $_GET['musica'] : null;
    $otros = isset($_GET['otros']) ? $_GET['otros'] : null;

    // Variable que controla si hay algún error en los datos
    $hayErrores = false;

    echo "<h1>Datos personales</h1>";
    echo "<div style='border: 1px solid #000; padding: 10px; width: 300px;'>";

    // Validamos cada campo y mostramos mensajes si faltan datos
    if (empty($nombre)) {
        echo "<p>No ha escrito su nombre.</p>";
        $hayErrores = true;
    } else {
        echo "<p>Su nombre es <strong>$nombre</strong>.</p>";
    }

    if (empty($apellidos)) {
        echo "<p>No ha escrito sus apellidos.</p>";
        $hayErrores = true;
    } else {
        echo "<p>Sus apellidos son <strong>$apellidos</strong>.</p>";
    }

    if (empty($edad)) {
        echo "<p>No ha indicado su edad.</p>";
        $hayErrores = true;
        //Segun la seleccion , escribiremos una cosa u otra
    } else {
        if ($edad == "1") {
            echo "<p>Tiene <strong>menos de 20 años</strong>.</p>";
        } elseif ($edad == "2") {
            echo "<p>Tiene <strong>entre 20 y 39 años</strong>.</p>";
        } elseif ($edad == "3") {
            echo "<p>Tiene <strong>entre 40 y 59 años</strong>.</p>";
        } else {
            echo "<p>Tiene <strong>60 años o más</strong>.</p>";
        }
    }

    if (empty($peso)) {
        echo "<p>No ha escrito su peso.</p>";
        $hayErrores = true;
    } else {
        echo "<p>Su peso es de <strong>$peso kg</strong>.</p>";
    }

    if (empty($genero)) {
        echo "<p>No ha indicado su género.</p>";
        $hayErrores = true;
    } else {
        echo "<p>Es un <strong>$genero</strong>.</p>";
    }

    if (empty($estadoCivil)) {
        echo "<p>No ha indicado su estado civil.</p>";
        $hayErrores = true;
    } else {
        echo "<p>Su estado civil es <strong>$estadoCivil</strong>.</p>";
    }

    // Mostramos las preferencias del usuario solo si no hay errores
    if (!$hayErrores) {
        
        $gustos = []; // Creamos un array vacio para almacenar las preferencias

        // Dependiendo de lo que el usuario seleccione, lo añadimos al array de gustos
        if ($cine) $gustos[] = "el cine";
        if ($lectura) $gustos[] = "la lectura";
        if ($television) $gustos[] = "la television";
        if ($deporte) $gustos[] = "el deporte";
        if ($musica) $gustos[] = "la música";
        if ($otros) $gustos[] = "otros";

        // Si el array de gustos no esta vacio, mostramos las preferencias seleccionadas
        if (!empty($gustos)) {
            echo "<p>Le gusta: <strong>" . implode(", ", $gustos) . "</strong>.</p>";
        }
    }

    // Añadimos un enlace para que el usuario pueda volver al formulario
    echo "<p><a href='Bienvenido_CarlosPerez_2.php'>Volver al formulario.</a></p>";
    echo "</div>";

} else {
    echo "<p>Por favor, envía el formulario.</p>";
}

?>
