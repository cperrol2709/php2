<?php
echo "<pre>";

// Verificamos si se ha enviado un nombre y deportes seleccionados
if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $deportes = isset($_POST['deportes']) ? $_POST['deportes'] : [];

    // Contamos la cantidad de deportes seleccionados
    $cantidad_deportes = count($deportes);

    echo "Nombre: $nombre\n";
    echo "Cantidad de deportes que practica: $cantidad_deportes\n";

    // Mostramos los deportes seleccionados si hay alguno
    if ($cantidad_deportes > 0) {
        echo "Deportes seleccionados:\n";
        foreach ($deportes as $deporte) {
            echo "- " . ucfirst($deporte) . "\n";
        }
    } else {
        echo "No seleccionaste ningún deporte.";
    }
} else {
    echo "Por favor, completa el nombre en el formulario.";
}

echo "</pre>";
?>
