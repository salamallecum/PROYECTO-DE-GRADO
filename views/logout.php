<?php
//Script creado exlusivamente para cerrar sesión
session_start();
session_destroy();
header("Location: ../index.php");
?>