<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $nombre = $_GET['nombre']; 
    $apellidos = $_GET['apellidos'];
    $edad =  $_GET['edad'];
    $peso = $_GET['peso'];
    
    if ($nombre === '') {
        echo "El nombre esta vacio.";
        exit; 
    }

    if ($apellidos === '') {
        echo "Los apellidos estan vacios.";
        exit; 
    }

    if($edad === '') {
        echo "La edad esta vacia.";
        exit;
    }

    if($edad<0) {
        echo "La edad debe ser positiva.";
        exit;
    }

    if($edad<10 || $edad>150) {
        echo "La edad debe estar entre el 5 y el 150.";
        exit;
    }

    if($peso === '') {
        echo "El peso esta vacio.";
        exit;
    }

    if($peso<10 || $peso>150) {
        echo "El peso debe estar entre el 10 y el 150.";
        exit;
    }

    echo "<p><strong>Tus datos son:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Nombre y Apellidos:</strong> $nombre $apellidos</li>";
    echo "<li><strong>Edad:</strong> $edad</li>";
    echo "<li><strong>Peso:</strong> $peso</li>";
    echo "</ul>";
    echo "<p><a href='Ejercicio2_Index.php'>Volver al formulario.</a></p>";
    echo "</div>";
} else {
    echo "<p>Por favor, envía el formulario.</p>";
}
?>