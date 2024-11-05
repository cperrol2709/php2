<?php

try{
    $mysql = "mysql:host=172.26.43.77;dbname=test_store;charset=UTF8";
    $user = "carlos";
    $password = "carlos";

    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    $conexion = new PDO($mysql,$user,$password,$opciones);

    echo "<p>Conectado a la BBDD</p>" . PHP_EOL;
    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "<p>Version: $version" . "</p>" . PHP_EOL;
    $resultado = $conexion->query('select * from customers');

    while ($registro = $resultado->fetch()){
        echo  "<p>Nombre: " . $registro['first_name'] . "&emsp;Apellido: " . $registro['last_name'];
    }
}catch(PDOException $e){
    echo "<p>$e</p>";
}

?>