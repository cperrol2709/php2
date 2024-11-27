Escriba un programa de dos páginas que simule el juego de cara y cruz. Las reglas del juego son las siguientes:
Se tira una moneda de dos caras: cara A A y cara B: B
Se lleva la cuenta de las veces que ha salido cada resultado.
El jugador A es un gato, que muestra las siguientes expresiones: 😸 (entidad numérica &#128568;) si va ganando, 😼 (entidad numérica &#128572;) si va empatando y 🙀 (entidad numérica &#128576;) si va perdiendo.
El jugador B es un mono, que muestra las siguientes expresiones: 🐵 (entidad numérica &#128053;) si va ganando, 🙊 (entidad numérica &#128586;) si va empatando y 🙈 (entidad numérica &#128584;) si va perdiendo.
La primera página muestra el estado de la partida y contiene dos botones:
Uno para lanzar de nuevo la moneda
Otro para volver a empezar una nueva partida
La segunda página recoge el botón, modifica las variables de sesión y redirige a la primera página. Las variables de sesión pueden ser tres:
La cara de la moneda que ha salido (A o B).
El número de veces que ha salido la cara A.
El número de veces que ha salido la cara B.

<?php
session_start();

// Inicializar variables de sesión si es la primera vez que se accede
if (!isset($_SESSION['cara_a'])) {
    $_SESSION['cara_a'] = 0; // Veces que ha salido A
    $_SESSION['cara_b'] = 0; // Veces que ha salido B
    $_SESSION['ultimo_resultado'] = null; // Último resultado
}

function obtenerIcono($jugador, $ganando, $empatando) {
    if ($ganando) return $jugador === 'A' ? '&#128568;' : '&#128053;'; // Gato feliz o mono feliz
    if ($empatando) return $jugador === 'A' ? '&#128572;' : '&#128586;'; // Gato neutro o mono neutro
    return $jugador === 'A' ? '&#128576;' : '&#128584;'; // Gato triste o mono triste
}

$total_a = $_SESSION['cara_a'];
$total_b = $_SESSION['cara_b'];

$ganando_a = $total_a > $total_b;
$empatando = $total_a === $total_b;
$ganando_b = $total_b > $total_a;

$icono_a = obtenerIcono('A', $ganando_a, $empatando);
$icono_b = obtenerIcono('B', $ganando_b, $empatando);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cara o Cruz</title>
</head>
<body>
    <h1>CARA O CRUZ</h1>
    <p>Haga clic en uno de los botones:</p>
    <form action="CaraOCruz2.php" method="post">
        <button type="submit" name="accion" value="lanzar">Lanzar moneda</button>
        <button type="submit" name="accion" value="reiniciar">Volver a empezar</button>
    </form>

    <h2>Resultado</h2>
    <?php if ($_SESSION['ultimo_resultado']): ?>
        <p>Último resultado: <?php echo $_SESSION['ultimo_resultado'] === 'A' ? 'Cara A' : 'Cara B'; ?></p>
    <?php endif; ?>

    <h2>Marcador</h2>
    <table border="1">
        <tr>
            <th>Jugador A</th>
            <th>Resultado</th>
            <th>Jugador B</th>
        </tr>
        <tr>
            <td><?php echo $total_a; ?></td>
            <td><?php echo $icono_a; ?></td>
            <td><?php echo $total_b; ?></td>
        </tr>
    </table>
</body>
</html>
