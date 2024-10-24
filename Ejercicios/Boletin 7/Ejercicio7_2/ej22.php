<html>
<head>
<title>Ejemplo de PHP</title>
</head>

<body>

<?php
print "<pre>";
print_r($_POST);

$N = $_POST['N']; // Tamaño de la matriz
$A = $_POST['A']; // Matriz
$fil = ($_POST['fil'] - 1); // Fila seleccionada
$col = ($_POST['col'] - 1); // Columna seleccionada
$F = $fil + 1; // Para mostrar la fila en 1
$C = $col + 1; // Para mostrar la columna en 1
$tr = $_POST['tr']; // Trayectoria seleccionada

// Mostramos los valores de la matriz partiendo de la posición seleccionada y la trayectoria
echo "Los valores de la matriz partiendo de la posicion ($F , $C) y con la trayectoria seleccionada son:<p>";
verTrayectoria($A, $N, $fil, $col, $tr);

// Funcion para mostrar la trayectoria según la opción seleccionada
function verTrayectoria($A, $N, $fil, $col, $tr) {
    if ($tr == 1) { // Arriba
        for ($i = $fil, $j = $col; $i >= 0; $i--) {
            echo "{$A[$i][$j]} ";
        }
    } elseif ($tr == 2) { // Arriba y a la derecha
        for ($i = $fil, $j = $col; $i >= 0 && $j < $N; $i--, $j++) {
            print "{$A[$i][$j]} ";
        }
    } elseif ($tr == 3) { // A la derecha
        for ($i = $fil, $j = $col; $j < $N; $j++) {
            print "{$A[$i][$j]} ";
        }
    } elseif ($tr == 4) { // Abajo y a la derecha
        for ($i = $fil, $j = $col; $i < $N && $j < $N; $i++, $j++) {
            print "{$A[$i][$j]} ";
        }
    } elseif ($tr == 5) { // Abajo
        for ($i = $fil, $j = $col; $i < $N; $i++) {
            print "{$A[$i][$j]} ";
        }
    } elseif ($tr == 6) { // Abajo y a la izquierda
        for ($i = $fil, $j = $col; $i < $N && $j >= 0; $i++, $j--) {
            print "{$A[$i][$j]} ";
        }
    } elseif ($tr == 7) { // A la izquierda
        for ($i = $fil, $j = $col; $j >= 0; $j--) {
            print "{$A[$i][$j]} ";
        }
    } elseif ($tr == 8) { // Arriba y a la izquierda
        for ($i = $fil, $j = $col; $i >= 0 && $j >= 0; $i--, $j--) {
            print "{$A[$i][$j]} ";
        }
    }
    print "<BR>\n";
}

?>
<p><a href="ej20.php">Volver al inicio.</a></p>
