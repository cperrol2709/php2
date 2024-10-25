<?php
// Iniciar sesion 
session_start();

// Si se presiona el boton de borrar, reiniciamos los votos
if (isset($_POST['borrar'])) {
    $_SESSION['votos'] = [0, 0, 0, 0, 0];
}

// Si no existen los votos, lo inicializamos
if (!isset($_SESSION['votos'])) {
    $_SESSION['votos'] = [0, 0, 0, 0, 0]; 
}

// Incrementamos contador si se vota
if (isset($_POST['equipo'])) {
    $equipo = $_POST['equipo']; // Obtenemos el equipo votado
    $_SESSION['votos'][$equipo]++; // Incrementamos el contador del equipo
}

// Calculamos total de votos
$totalVotos = array_sum($_SESSION['votos']);

// Calculamos porcentaje de votos para cada equipo
function calcularPorcentaje($votos, $total) {
    return $total > 0 ? round(($votos / $total) * 100, 2) : 0;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Votaciones</title>
</head>

<body>
    <h1>Vota al equipo que crees que ganara la liga</h1>

    <form method="post">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <button name="equipo" value="0" style="background-image: url('img/atletico.png'); border:0; width: 72px; height: 72px"></button>
            <div style="background-color: orange; height: 72px; width: <?= calcularPorcentaje($_SESSION['votos'][0], $totalVotos) * 3 ?>px;"><!-- Calculamos el ancho del porcentaje de la barra -->
                <?= calcularPorcentaje($_SESSION['votos'][0], $totalVotos) ?> % <!-- Calculamos el porcentaje de cada equipo -->
            </div>
        </div>

        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <button name="equipo" value="1" style="background-image: url('img/betis.png'); border:0; width: 72px; height: 72px"></button>
            <div style="background-color: orange; height: 72px; width: <?= calcularPorcentaje($_SESSION['votos'][1], $totalVotos) * 3 ?>px;"><!-- Calculamos el ancho del porcentaje de la barra -->
                <?= calcularPorcentaje($_SESSION['votos'][1], $totalVotos) ?> % <!-- Calculamos el porcentaje de cada equipo -->
            </div>
        </div>

        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <button name="equipo" value="2" style="background-image: url('img/barcelona.png'); border:0; width: 72px; height: 72px"></button>
            <div style="background-color: orange; height: 72px; width: <?= calcularPorcentaje($_SESSION['votos'][2], $totalVotos) * 3 ?>px;"><!-- Calculamos el ancho del porcentaje de la barra -->
                <?= calcularPorcentaje($_SESSION['votos'][2], $totalVotos) ?> % <!-- Calculamos el porcentaje de cada equipo -->
            </div>
        </div>

        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <button name="equipo" value="3" style="background-image: url('img/realmadrid.png'); border:0; width: 72px; height: 72px"></button>
            <div style="background-color: orange; height: 72px; width: <?= calcularPorcentaje($_SESSION['votos'][3], $totalVotos) * 3 ?>px;"><!-- Calculamos el ancho del porcentaje de la barra -->
                <?= calcularPorcentaje($_SESSION['votos'][3], $totalVotos) ?> % <!-- Calculamos el porcentaje de cada equipo -->
            </div>
        </div>

        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <button name="equipo" value="4" style="background-image: url('img/sevilla.png'); border:0; width: 72px; height: 72px"></button>
            <div style="background-color: orange; height: 72px; width: <?= calcularPorcentaje($_SESSION['votos'][4], $totalVotos) * 3 ?>px;"><!-- Calculamos el ancho del porcentaje de la barra -->
                <?= calcularPorcentaje($_SESSION['votos'][4], $totalVotos) ?> % <!-- Calculamos el porcentaje de cada equipo -->
            </div>
        </div>

        <!-- Boton para borrar votos -->
        <input type="submit" name="borrar" value="Borrar votos"> 
    </form>
</body>

</html>
