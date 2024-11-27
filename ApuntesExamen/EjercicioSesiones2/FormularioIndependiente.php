Escriba un conjunto de siete páginas que soliciten el nombre y los apellidos del usuario.

En la página de inicio (index.html), se muestran enlaces a cuatro páginas:
La página "Escribir su nombre" (nombre-1.php) solicita el nombre del usuario y lo envía a otra página (nombre-2.php).
Si ya se ha escrito el nombre, la página nombre-1.php lo muestra.
La página nombre-2.php comprueba si se ha escrito algo. Si no se ha escrito nada, se vuelve a la página nombre-1.php, mostrando un aviso. Si se ha escrito algo, se guarda el nombre en $_SESSION y se vuelve a la página inicial
La página "Escribir sus apellidos" (apellidos-1.php) solicita los apellidos del usuario y los envía a otra página (apellidos-2.php).
Si ya se ha escrito los apellidos, la página apellidos-1.php los muestra.
La página apellidos-2.php comprueba si se ha escrito algo. Si no se ha escrito nada, se vuelve a la página apellidos-1, mostrando un aviso. Si se ha escrito algo, se guardan los apellidos en $_SESSION y se vuelve a la página inicial
La página "Ver su nombre y apellidos" (ver.php) muestra los datos almacenados en $_SESSION
La página "Borrar la información" (borrar.php) destruye la sesión.

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nombre y Apellidos (Inicio)</title>
</head>
<body>
    <h1>Elija una opción:</h1>
    <ul>
        <li><a href="FormularioIndependiente2.php">Escribir su nombre</a></li>
        <li><a href="FormularioIndependiente4.php">Escribir sus apellidos</a></li>
        <li><a href="FormularioIndependiente6.php">Ver su nombre y apellidos</a></li>
        <li><a href="FormularioIndependiente7.php">Borrar la información</a></li>
    </ul>
</body>
</html>
