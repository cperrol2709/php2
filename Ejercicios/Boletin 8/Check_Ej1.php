<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $edad = $_GET['edad'];
    $email = $_GET['email'];
    $comprobacion = true;

    if(!$edad < 65 && $edad > 18){
        echo "<p>La edad introducida no es correcta</p>";
        $comprobacion = false;
    };


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>El formato del email no es correcto.</p>";
        $comprobacion = false;
        exit;
    }

    if($comprobacion === true){
        header("Location:Ficha_Ej1.php");
    }else{
        echo "Datos introducidos incorrectamente";
    }
}else{
    echo "<p>Por favor, envía el formulario.</p>";
}
?>