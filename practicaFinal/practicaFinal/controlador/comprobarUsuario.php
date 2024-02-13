<?php
session_start();
require_once "../modelo/conectar.php";

if (Conectar::comprobarUsuario($_POST['username'], $_POST['password'])) {
    header("Location: ../vista/bienvenida.php");
} else {
    echo "Error de autenticación. Redirigiendo a la página de inicio de sesión...";
    header("Location: ../vista/login.php");
}
