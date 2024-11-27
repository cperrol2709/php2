Escriba un formulario de recogida de datos personales que conste de dos páginas.

En la primera página se solicitan la dirección de correo electrónico y si se está interesado en recibir correos.
En la segunda página se muestran la respuesta del usuario o se informa de los errores cometidos.
Notas:

Para validar la primera dirección de correo electrónico, se puede utilizar la función filter_var()
No es necesario validar la segunda dirección de correo, simplemente se comprobará si coincide con la primera.
En la segunda página se mostrará un aviso si no se indica si se quiere o no recibir correos.

<?php
// Función de recogida de datos
function recoge($key, $type = "")
{
    if (!is_string($key) && !is_int($key) || $key == "") {
        trigger_error("Function recoge(): Argument #1 (\$key) must be a non-empty string or an integer", E_USER_ERROR);
    } elseif ($type !== "" && $type !== []) {
        trigger_error("Function recoge(): Argument #2 (\$type) is optional, but if provided, it must be an empty array or an empty string", E_USER_ERROR);
    }
    $tmp = $type;
    if (isset($_REQUEST[$key])) {
        if (!is_array($_REQUEST[$key]) && !is_array($type)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$key]));
        } elseif (is_array($_REQUEST[$key]) && is_array($type)) {
            $tmp = $_REQUEST[$key];
            array_walk_recursive($tmp, function (&$value) {
                $value = trim(htmlspecialchars($value));
            });
        }
    }
    return $tmp;
}

$correo  = recoge("correo");
$correo2 = recoge("correo2");
$recibir = recoge("recibir");

$correoOk  = false;
$correo2Ok = false;
$recibirOk = false;

if ($correo == "") {
    print "  <p class=\"aviso\">No ha escrito su dirección de correo.</p>\n";
    print "\n";
} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    print "  <p class=\"aviso\">No ha escrito una dirección de correo correcta.</p>\n";
    print "\n";
} else {
    $correoOk = true;
}

if ($correo2 != $correo) {
    print "  <p class=\"aviso\">Las direcciones de correo no coinciden.</p>\n";
    print "\n";
} else {
    $correo2Ok = true;
}

if ($recibir == "-1") {
    print "  <p class=\"aviso\">No ha indicado si desea recibir correo.</p>\n";
    print "\n";
} elseif ($recibir != "0" && $recibir != "1") {
    print "  <p class=\"aviso\">Por favor, indique si quiere recibir o no correo.</p>\n";
    print "\n";
} else {
    $recibirOk = true;
}

if ($correoOk && $correo2Ok && $recibirOk) {
    print "  <p>Su dirección de correo es <strong>$correo</strong>.</p>\n";
    print "\n";
    if ($recibir == "0") {
        print "  <p><strong>No</strong> recibirá correos nuestros.</p>\n";
        print "\n";
    } else {
        print "  <p><strong>Sí</strong> recibirá correos nuestros.</p>\n";
        print "\n";
    }
}
?>

