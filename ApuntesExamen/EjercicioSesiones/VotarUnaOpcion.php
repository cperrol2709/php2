Escriba un programa de dos páginas que muestre gráficamente los votos recogidos por dos opciones.

La primera página contiene un formulario con tres botones de tipo submit con el mismo atributo name.
Dos botones permiten votar a una u otra opción
El tercer botón pone a cero los contadores de votos
La segunda página recibe el dato, modifica la variable de sesión que contiene el número de votos de la opción elegida (o ambas) y redirige a la primera página.
Los dos números se guardan en dos variables de sesión. Si las variables de sesión no están definidas, se les dará el valor 0.
Las franjas correspondientes a los votos se alargan de 10px en 10px y no tienen límite de tamaño.

<?php
// Iniciar sesión
session_start();

// Inicializar contadores si no existen
if (!isset($_SESSION["a"])) $_SESSION["a"] = 0;
if (!isset($_SESSION["b"])) $_SESSION["b"] = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Barras</title>
</head>
<body>
    <h1>Control de Barras</h1>
    <form method="POST" action="VotarUnaOpcion2.php">
        <table>
            <!-- Barra A -->
            <tr>
                <td style="vertical-align: top;">
                    <button type="submit" name="accion" value="a" style="font-size: 60px; line-height: 50px; color: blue;">✔</button>
                </td>
                <td>
                    <svg width="<?php echo $_SESSION['a']; ?>" height="50">
                        <line x1="0" y1="25" x2="<?php echo $_SESSION['a']; ?>" y2="25" stroke="blue" stroke-width="50" />
                    </svg>
                </td>
            </tr>
            <!-- Barra B -->
            <tr>
                <td>
                    <button type="submit" name="accion" value="b" style="font-size: 60px; line-height: 50px; color: orange;">✔</button>
                </td>
                <td>
                    <svg width="<?php echo $_SESSION['b']; ?>" height="50">
                        <line x1="0" y1="25" x2="<?php echo $_SESSION['b']; ?>" y2="25" stroke="orange" stroke-width="50" />
                    </svg>
                </td>
            </tr>
        </table>
        <button type="submit" name="accion" value="cero" style="margin-top: 20px;">Restablecer</button>
    </form>
</body>
</html>
