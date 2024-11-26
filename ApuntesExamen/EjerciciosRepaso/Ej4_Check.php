<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Obtenemos los datos con isset para comprobar que llegaron y si no le asignamos null
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
    $apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : null;
    $edad = isset($_GET['edad']) ? $_GET['edad'] : null;
    $peso = isset($_GET['peso']) ? $_GET['peso'] : null;
    $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
    $estadoCivil = isset($_GET['estadoCivil']) ? $_GET['estadoCivil'] : null;

    $cine = isset($_GET['cine']) ? $_GET['cine'] : null;
    $literatura = isset($_GET['literatura']) ? $_GET['literatura'] : null;
    $tebeos = isset($_GET['tebeos']) ? $_GET['tebeos'] : null;
    $deporte = isset($_GET['deporte']) ? $_GET['deporte'] : null;
    $musica = isset($_GET['musica']) ? $_GET['musica'] : null;
    $television = isset($_GET['television']) ? $_GET['television'] : null;

    // Mostramos los datos introducidos o los errores
    if (!empty($nombre)) {
        echo "Nombre: $nombre<br>";
    } else {
        echo "No ha introducido el nombre.<br>";
    }

    if (!empty($apellidos)) {
        echo "Apellidos: $apellidos<br>";
    } else {
        echo "No ha introducido los apellidos.<br>";
    }

    if (!empty($edad)) {
        echo "Edad: $edad años<br>";
    } else {
        echo "No ha introducido su edad.<br>";
    }

    if (!empty($peso)) {
        echo "Peso: $peso kg<br>";
    } else {
        echo "No ha introducido su peso.<br>";
    }

    if (!empty($genero)) {
        echo "Género: $genero<br>";
    } else {
        echo "No ha introducido su género.<br>";
    }

    if (!empty($estadoCivil)) {
        echo "Estado Civil: $estadoCivil<br>";
    } else {
        echo "No ha introducido su estado civil.<br>";
    }

    // Aficiones seleccionadas
    echo "<strong>Aficiones seleccionadas:</strong><br>";
    $aficiones = [];
    if ($cine) $aficiones[] = "Cine";
    if ($literatura) $aficiones[] = "Literatura";
    if ($tebeos) $aficiones[] = "Tebeos";
    if ($deporte) $aficiones[] = "Deporte";
    if ($musica) $aficiones[] = "Música";
    if ($television) $aficiones[] = "Televisión";

    if (!empty($aficiones)) {
        echo implode(", ", $aficiones) . "<br>";
    } else {
        echo "No ha seleccionado ninguna afición.<br>";
    }

} else {
    echo "Por favor, envíe el formulario.";
}
?>