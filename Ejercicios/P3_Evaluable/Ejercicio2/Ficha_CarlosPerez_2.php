<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $edad = $_GET['edad'];
    $peso = $_GET['peso'];
    $genero = $_GET['genero'];
    $estadoCivil = $_GET['estadoCivil'];
    $cine = $_GET['cine'];
    $lectura = $_GET['lectura'];
    $television = $_GET['television'];
    $deporte = $_GET['deporte'];
    $musica = $_GET['musica'];
    $otros = $_GET['otros'];

    echo "<h1><strong>Datos Personales</strong></h1>";
    echo "<div style='border: 2px solid #000; padding: 10px; width: 300px;'>";
    echo "<ul>";
    if($nombre != null){
        echo "Su nombre es $nombre \n";
    }else{
        echo "No ha indicado su nombre \n";
    }
    
    if($apellidos != null){
        echo "Sus apellidos son $apellidos \n";
    }else{
        echo "No ha indicado sus apellidos \n";
    }

    if($edad != null){
        echo "Tiene $edad \n";
    }else{
        echo "No ha indicado su edad \n";
    }

    if($peso != null){
        echo "Su peso es de $peso kg \n";
    }else{
        echo "No ha escrito su peso \n";
    }

    if($genero != null){
        echo "Es un $genero \n";
    }else{
        echo "No ha indicado su genero \n";
    }

    if($estadoCivil != null){
        echo "Su estado civil es $estadoCivil \n";
    }else{
        echo "No ha indicado su estado civil \n";
    }

    if($nombre != null){
        echo "Su nombre es: $nombre";
    }else{
        echo "No ha indicado su nombre ";
    }
    echo "<p><a href='Index_CarlosPerez_1.php'>Volver al formulario.</a></p>";
    echo "</div>";
} else {
    echo "<p>Por favor, envía el formulario.</p>";
}
?>