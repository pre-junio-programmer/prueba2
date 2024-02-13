<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="../controlador/aniadirUsuario.php" method="post">
        @csrf
        <label for="username">Usuario:</label>
        <input type="text" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

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

        <button type="submit">Registrarse</button>
    </form>

    <form action="login.php" method="get">
        <button type="submit">Iniciar Sesion</button>
    </form>
</body>
</html>
