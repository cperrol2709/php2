<?php

try{
    $mysql = "mysql:host=172.26.104.220;dbname=ejercicio01;charset=UTF8";
    $user = "pepito01";
    $password = "pepito01";

    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    $conexion = new PDO($mysql,$user,$password,$opciones);

    echo "<p>Conectado a la BBDD</p>" . PHP_EOL;
    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "<p>Version: $version" . "</p>" . PHP_EOL;
    $resultado = $conexion->query('select * from empleados');

    while ($registro = $resultado->fetch()){
        echo  "<p>ID: " . $registro['id'] . "&emsp;Nombre: " . $registro['nombre'] . "&emsp;Email: " . $registro['email'] . "&emsp;Apellidos:" . $registro['apellidos'] . "&emsp;Salario:" . $registro['salario'] . "&emsp;Hijos:" . $registro['hijos'] . "&emsp;Departamento ID:" . $registro['departamento_id'] . "&emsp;Pais ID:" . $registro['pais_id'];
    }
}catch(PDOException $e){
    echo "<p>$e</p>";
}

?>