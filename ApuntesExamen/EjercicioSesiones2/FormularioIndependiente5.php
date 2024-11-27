<?php
session_start();
if (!empty($_POST['apellidos'])) {
    $_SESSION['apellidos'] = htmlspecialchars($_POST['apellidos']);
    header("Location: index.html");
    exit();
} else {
    header("Location: apellidos-1.php?error=1");
    exit();
}
?>
