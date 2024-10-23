<?php

$usuario = $_POST['usuario'];//Obtenemos el nombre de usuaro introducido
$contraseña = $_POST['clave'];//Obtenemos la contrasela introducida

//Hacemos un if comprobando que el usuario y la contraseña son correctas
if($usuario === 'daw_tarde' &&  $contraseña === 'velazquez'){
    header("Location: Bienvenido_CarlosPerez_2.php");
    exit;
}else{
    echo "Usted no esta autorizado";
    echo "<p><a href='User_CarlosPerez_2.php'>Volver.</a></p>";
}
?>