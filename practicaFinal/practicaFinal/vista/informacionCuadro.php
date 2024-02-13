<?php
session_start();

require_once '../modelo/conectar.php';

if (!isset($_SESSION['nombre'])) {
    header("Location: ../vista/Login.php");
    exit();
}

// Obtener el ID del cuadro desde la URL
if (isset($_GET['id_cuadro'])) {
    $resultado = Conectar::informacionCuadro($_GET['id_cuadro']);    

    if (!$resultado) {
        header("Location: Bienvenida.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Cuadro</title>
</head>
<body>

<h2>Detalles del Cuadro</h2>

<div>
    <img src="../img/<?php echo $resultado['img']; ?>" width="500" height="500" alt="Cuadro">
</div>

<div>
    <h3><?php echo $resultado['title']; ?></h3>
    <p><strong>Descripción:</strong> <?php echo $resultado['description']; ?></p>
    <p><strong>Fecha de Pintura:</strong> <?php echo $resultado['year']; ?></p>
    <p><strong>Museo:</strong> <?php echo $resultado['museo']; ?></p>
</div>

<form action="bienvenida.php" method="post">
    <button type="submit">Volver</button>
</form>

<form action="../controlador/cerrarSesion.php" method="post">
    <button type="submit">Cerrar sesion</button>
</form>

</body>
</html>
