<?php
session_start();

// Iniciar valores de sesión si no están definidos
if (!isset($_SESSION['tiradas'])) {
    $_SESSION['tiradas'] = 0;
    $_SESSION['dados_diferentes'] = 0;
    $_SESSION['max_puntuacion'] = 5;
    $_SESSION['dados'] = [1, 1, 1, 1, 1]; // Mostramos cinco dados con valor 1 al principio
}

// Función para calcular si los dados son diferentes entre ellos
function todos_diferentes($dados) {
    return count(array_unique($dados)) === count($dados);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dados</title>
</head>
<body>
    <h1>Juego de los dados diferentes</h1>
    <div>
        <h2>Tirada:</h2>
        <div>
            <?php
            // Mostramos los dados actuales
            foreach ($_SESSION['dados'] as $dado) {
                echo "<img src='img/$dado.svg' alt='Dado $dado' style='width:100px; height:100px;' />";
            }
            ?>
        </div>

        <p>Número de veces que han salido todos los dados diferentes: <?php echo $_SESSION['dados_diferentes']; ?></p>
        <p>Puntuación más alta: <?php echo $_SESSION['max_puntuacion']; ?></p>
        <p>Número de tiradas: <?php echo $_SESSION['tiradas']; ?></p>

        <!-- Botón para nueva tirada -->
        <form action="Proceso_Ej3.php" method="POST">
            <input type="hidden" name="accion" value="tirada">
            <button type="submit">Nueva tirada</button>
        </form>

        <!-- Botón para volver a empezar -->
        <form action="Proceso_Ej3.php" method="POST">
            <input type="hidden" name="accion" value="reiniciar">
            <button type="submit">Volver a empezar</button>
        </form>
    </div>
</body>
</html>
