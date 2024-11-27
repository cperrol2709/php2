<?php
session_start();

// Inicializar variables de sesión si es la primera vez que se accede
if (!isset($_SESSION['cara_1a'])) {
    $_SESSION['cara_1a'] = 0;
    $_SESSION['cara_2b'] = 0;
    $_SESSION['resultado'] = null;
}

//Guardamos en variable de sesion cara1 y cara 2
$total_1a = $_SESSION['cara_1a'];
$total_2b = $_SESSION['cara_2b'];

//Variable si gana jugador 1 , jugador 2 o empate
$ganar1a = $total_1a > $total_2b;
$empate = $total_1a === $total_2b;
$ganar2b = $total_2b > $total_1a;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>CARA O CRUZ</h1>
    <p>Haz click:</p>
    <form action="Ejercicio3_CC2.php" method="post">
        <button type="submit" name="accion" value="lanzar">Lanzar moneda</button>
        <button type="submit" name="accion" value="reiniciar">Empezar de nuevo</button>
    </form>

    <h2>Resultado</h2>
    <?php if ($_SESSION['resultado']): ?>
        <p>Resultado: <?php echo $_SESSION['resultado'] === 'A' ? 'Cara A' : 'Cara B'; ?></p>
    <?php endif; ?>

    <h2>Score</h2>
    <table>
        <tr>
            <th>1 Jugador A</th>
            <th>2 Jugador B</th>
        </tr>
        <tr>
            <td><?php echo $total_1a; ?></td>
            <td><?php echo $total_2b; ?></td>
        </tr>
    </table>
</body>

</html>