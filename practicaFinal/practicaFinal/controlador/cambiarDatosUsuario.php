<?php
    session_start();
    require_once "../modelo/conectar.php";
    
    if (!isset($_SESSION['nombre'])) {
        header("Location: login.php");
        exit();
    }
   
    $nombre = $_SESSION['nombre'];

    Conectar::modificarUsuario($nombre, $_POST['password'], $_POST['email'], $_POST['favorite_painter']);

    echo "Los datos se han modificado con exito";

    session_destroy();
    header("Location: ../vista/login.php");