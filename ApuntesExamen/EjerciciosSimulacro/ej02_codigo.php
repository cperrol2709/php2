<?php
/**
     * Método que devuelve valor de una clave del REQUEST limpia o cadena vacía si no existe
     * @param {string} - Clave del REQUEST de la que queremos obtener el valor
     * @return {string}
     */
    function obtenerValorCampo(string $campo): string{
        if (isset($_REQUEST[$campo])){
            $valor = trim(htmlspecialchars($_REQUEST[$campo], ENT_QUOTES, "UTF-8"));
        }else{
            $valor = "";
        }
        return $valor;
    }

$nombre    = obtenerValorCampo("nombre");
$apellidos = obtenerValorCampo("apellidos");
$edad = obtenerValorCampo("edad");
$peso = obtenerValorCampo("peso");

// Comprobamos los datos recibidos procedentes de un formulario
$nombreOk    = false;
$apellidosOk = false;
$edadOk = false;
$pesoOk = false;

if ($nombre == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>". PHP_EOL;
} else {
    $nombreOk = true;
}

if ($apellidos == "") {
    print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>".PHP_EOL ;
} else {
    $apellidosOk = true;
}

if ($edad == "") {
    print "  <p class=\"aviso\">No ha escrito su edad.</p>".PHP_EOL;
    print "\n";
} elseif (!is_numeric($edad)) {
    print "  <p class=\"aviso\">No ha escrito su edad como número.</p>".PHP_EOL;
    print "\n";
} elseif (!ctype_digit($edad)) {
    print "  <p class=\"aviso\">No ha escrito su edad como número entero.</p>".PHP_EOL;
    print "\n";
} elseif ($edad < 5|| $edad > 130) {
    print "  <p class=\"aviso\">Su edad no está entre 5 y 130 años.</p>".PHP_EOL;
    print "\n";
} else {
    $edadOk = true;
}

if ($peso == "") {
    print "  <p class=\"aviso\">No ha escrito su peso.</p>".PHP_EOL;
} elseif (!is_numeric($peso)) {
    print "  <p class=\"aviso\">No ha escrito su peso como número.</p>".PHP_EOL;
} elseif ($peso < 10|| $peso > 150) {
    print "  <p class=\"aviso\">Su peso no está entre 10 y 150 kilos.</p>".PHP_EOL;
} else {
    $pesoOk = true;
}


if ($nombreOk && $apellidosOk && $edadOk && $pesoOk) {
    print "  <p>Su nombre es <strong>$nombre</strong>.</p>".PHP_EOL;
    print "  <p>Sus apellidos son <strong>$apellidos</strong>.</p>".PHP_EOL;
    print "  <p>Su edad es <strong>$edad</strong> años.</p>".PHP_EOL;
    print "  <p>Su peso es <strong>$peso</strong> kilos.</p>".PHP_EOL;
}
?>