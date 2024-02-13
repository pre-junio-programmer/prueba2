<?php
    session_start();
    $nombreUsuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilos.css">
    <title>Modificacion de Usuario</title>
</head>
<body>
    <div class="wrapper">
        <svg>
            <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                Modificacion de Usuario: <?php echo $nombreUsuario; ?>
            </text>
        </svg>
    </div>
    
    <div class="centrar">
        <form action="../controlador/cambiarDatosUsuario.php" method="post">
            <input class="input" type="password" name="password" placeholder="password" required><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required><br>

            <label for="favorite_painter">Pintor Favorito:</label>
            <select name="favorite_painter">
                @foreach ($pintores as $pintor)
                    <option value="1">Francisco de Goya</option>
                    <option value="2">Diego Velázquez</option>
                    <option value="3">Van Gogh</option>
                @endforeach
            </select><br>

            <button type="submit">Modificar usuario</button>
        </form>

        <form action="bienvenida.php" method="get"> 
            <button type="submit">Ver cuadros</button>
        </form>

        <form action="../controlador/cerrarSesion.php" method="get">
            <button type="submit">Cerrar Sesion</button>
        </form>
    </div>

</body>
</html>
