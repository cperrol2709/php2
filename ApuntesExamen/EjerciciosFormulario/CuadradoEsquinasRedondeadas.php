Controles en formularios (2) 11 - Cuadrado con esquinas redondeadas
Escriba un program que dibuje un cuadrado con las esquinas redondeadas de recogida de datos personales que conste de dos páginas.

En la primera página se solicitan los datos.
El tamaño del lado debe estar entre 20px y 500px. El tamaño de la esquina debe estar entre 10px y 250px.
El tamaño de la esquina debe ser como mucho la mitad del tamaño del lado.
En la segunda página se dibuja el cuadrado con esquinas redondeadas o se informa de los errores cometidos.

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

$lado    = recoge("lado");
$esquina = recoge("esquina");

$ladoOk    = false;
$esquinaOk = false;

if ($lado == "") {
    print "  <p class=\"aviso\">No ha escrito el tamaño del lado.</p>\n";
    print "\n";
} elseif (!is_numeric($lado)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño del lado como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($lado)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño del lado como número entero.</p>\n";
    print "\n";
} elseif ($lado < 20 || $lado > 500) {
    print "  <p class=\"aviso\">El tamaño del lado no está entre 20 y 500 px.</p>\n";
    print "\n";
} else {
    $ladoOk = true;
}

if ($esquina == "") {
    print "  <p class=\"aviso\">No ha escrito el tamaño de la esquina.</p>\n";
    print "\n";
} elseif (!is_numeric($esquina)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño de la esquina como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($esquina)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño de la esquina como número entero.</p>\n";
    print "\n";
} elseif ($esquina < 10 || $esquina > 250) {
    print "  <p class=\"aviso\">El tamaño de la esquina no está entre 20 y 500 px.</p>\n";
    print "\n";
} else {
    $esquinaOk = true;
}

if ($ladoOk && $esquinaOk) {
    if ($lado < $esquina * 2) {
        print "  <p class=\"aviso\">El tamaño del lado debe ser al menos el doble que el de la esquina.</p>\n";
        print "\n";
        $ladoOk    = false;
        $esquinaOk = false;
    }
}

if ($ladoOk && $esquinaOk) {
    print "  <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" \n"
        . "    width=\"" . $lado + 10 . "px\" height=\"" . $lado + 10 . "px\">\n";
    print "    <rect fill=\"white\" stroke=\"black\" stroke-width=\"10\" "
    . "x=\"5\" y=\"5\" width=\"$lado\" height=\"$lado\" rx=\"$esquina\" ry=\"$esquina\" />\n";
    print "  </svg>\n";
    print "\n";
}
?>