<?php
echo "<pre>";

if (isset($_POST['ciudad'], $_POST['empresa'], $_POST['representante'], $_POST['domicilio_empresa'], $_POST['empleado'], $_POST['domicilio_empleado'])) {
    $ciudad = htmlspecialchars($_POST['ciudad']);
    $empresa = htmlspecialchars($_POST['empresa']);
    $representante = htmlspecialchars($_POST['representante']);
    $domicilio_empresa = htmlspecialchars($_POST['domicilio_empresa']);
    $empleado = htmlspecialchars($_POST['empleado']);
    $domicilio_empleado = htmlspecialchars($_POST['domicilio_empleado']);

    // Contrato con los datos insertados
    echo "En la ciudad de $ciudad, se acuerda entre la Empresa $empresa representada por el Sr. $representante en su carácter de Apoderado, con domicilio en la calle $domicilio_empresa y el Sr. $empleado, futuro empleado con domicilio en $domicilio_empleado, celebrar el presente contrato a Plazo Fijo, de acuerdo a la normativa vigente de los artículos 90, 92, 93, 94, 95 y concordantes de la Ley de Contrato de Trabajo No. 20744.";
} else {
    echo "Faltan datos en el formulario. Por favor, complete todos los campos.";
}

echo "</pre>";
?>
