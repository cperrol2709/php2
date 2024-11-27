Controles en formularios (2) 12 - Círculo o cuadrado
Escriba un programa que dibuje un círculo o un cuadrado a elección del usuario que conste de dos páginas.

En la primera página se solicitan los datos.
En la segunda página se dibuja el círculo o el cuadrado o se informa de los errores cometidos.

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

$lado  = recoge("lado");
$forma = recoge("forma");

$ladoOk  = false;
$formaOk = false;

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

if ($forma == "") {
    print "  <p class=\"aviso\">No ha elegido ninguna forma.</p>\n";
    print "\n";
} elseif ($forma != "circulo" && $forma != "cuadrado") {
    print "  <p class=\"aviso\">Por favor, indique si quiere dibujar un cuadrado o un círculo.</p>\n";
    print "\n";
} else {
    $formaOk = true;
}

if ($ladoOk && $formaOk) {
    print "  <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" \n"
        . "    width=\"" . $lado + 10 . "px\" height=\"" . $lado + 10 . "px\">\n";
    if ($forma == "cuadrado") {
        print "  <rect fill=\"white\" stroke=\"black\" stroke-width=\"10\" "
        . "x=\"5\" y=\"5\" width=\"$lado\" height=\"$lado\" />\n";
    } else {
        print "    <circle cx=\"" . ($lado + 10) / 2 . "\" cy=\"" . ($lado + 10) / 2
            . "\" r=\"" . $lado / 2 . "\" stroke=\"black\" stroke-width=\"10\" fill=\"white\" />\n";
    }
    print "  </svg>\n";
    print "\n";
}
?>