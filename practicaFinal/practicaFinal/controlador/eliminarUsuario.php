<?php
    session_start();
    require_once "../modelo/conectar.php";

    if (!isset($_SESSION['nombre'])) {
        header("Location: login.php");
        exit();
    }

    $nombre = $_SESSION['nombre'];

    Conectar::eliminarUsuario($nombre);

    echo "Se ha eliminado con exito el usuario".$nombre;

    session_destroy();

    header("Location: ../vista/login.php");
?>