<?php
session_start();
session_destroy();
header("Location: FormularioIndependiente.html");
exit();
?>
