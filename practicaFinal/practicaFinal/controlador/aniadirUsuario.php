<?php
    require_once "../modelo/conectar.php";

    Conectar::aniadirUsuario($_POST['username'], $_POST['password'], $_POST['email'], $_POST['favorite_painter']);
    header("Location: ../vista/login.php");
?>