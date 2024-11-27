<?php

//Funcion para obtener el valor del campo
function obtenerValorCampo(string $campo): string
{
    if (isset($_REQUEST[$campo])) {
        $valor = trim(htmlspecialchars($_REQUEST[$campo], ENT_QUOTES, "UTF-8"));
    } else {
        $valor = "";
    }
    return $valor;
}

//Obtenemos el valor de la variable con la funcion
$nombre = obtenerValorCampo("nombre");
$apellidos = obtenerValorCampo("apellidos");
$sexo = obtenerValorCampo("sexo");

$cine = obtenerValorCampo("cine");
$literatura = obtenerValorCampo("literatura");
$musica = obtenerValorCampo("musica");

$gustos = []; // Creamos un array  para almacenar las preferencias

// Dependiendo de lo que el usuario seleccione, lo añadimos al array de gustos
if ($cine) $gustos[] = "el cine";
if ($literatura) $gustos[] = "la literatura";
if ($musica) $gustos[] = "la música";

//Imprimimos la informacion
if(!empty($nombre)){
    print "  <p>Su nombre es <strong>$nombre</strong>.</p>" . PHP_EOL;
}else{
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>" . PHP_EOL;
}

if(!empty($apellidos)){
    print "  <p>Sus apellidos son <strong>$apellidos</strong>.</p>" . PHP_EOL;
}else{
    print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>" . PHP_EOL;
}

if(!empty($sexo)){
    print "  <p>Su sexo es <strong>$sexo</strong>.</p>" . PHP_EOL;
}else{
    print "  <p class=\"aviso\">No ha seleccionado su sexo.</p>" . PHP_EOL;
}
if (!empty($gustos)) {
    print "  <p>Su/s aficion/es es/son <strong>" . implode(", ", $gustos) . "</strong>.</p>" . PHP_EOL;
} else {
    print " No se ha indicado ninguna aficion";
}
