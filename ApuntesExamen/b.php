<?php

//Solicitamos los datos 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //Obtenemos los datos con isset para comprobar que llegaron y si no le asignamos null
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
    $apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;

    //Imprimimos los datos
    echo "<table>";
    echo "<tr>Tu nombre es: $nombre</tr>";
    echo "<br>";
    echo "<tr>Tus apellidos son : $apellidos</tr>";
    echo "<br>";
    echo "<tr>Tu email es: $email</tr>";
    echo "</table>";
} else {
    echo "Envia el formulario , porfavor";
}
