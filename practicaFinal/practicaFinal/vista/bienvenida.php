<?php
    session_start();

    if (!isset($_SESSION['nombre'])) {
        header("Location: login.php"); 
        exit();
    }

    require_once "../modelo/conectar.php";

    $nombreUsuario = $_SESSION['nombre'];
    $pintorFavoritoID = $_SESSION['pintor'];
    $pinturasDelPintorFavorito = Conectar::pintorFavorito($pintorFavoritoID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $nombreUsuario; ?>!</h2>
    
    <p>Disfruta de las obras del pintor favorito:</p>

    <?php
    foreach ($pinturasDelPintorFavorito as $pintura) {
        echo '<div style="padding: 20px;">';
        echo '<a href="informacionCuadro.php?id_cuadro=' . $pintura['id'] . '">';
        echo '<img src="../img/' . $pintura['img'] . '" width="400" height="300" style="margin: auto; vertical-align: middle;">';
        echo '</a>';
        echo '</div>';
    }
    ?>

    <form action="../vista/modificarUsuario.php" method="get">
        <button type="submit">Modificar usuario</button>
    </form>

    <form action="../controlador/eliminarUsuario.php" method="get">
        <button type="submit">Eliminar usuario</button>
    </form>

    <form action="../controlador/cerrarSesion.php" method="get">
        <button type="submit">Cerrar sesion</button>
    </form>
</body>
</html>

