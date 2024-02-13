<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilos.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="wrapper">
        <svg>
            <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                Inicio Sesión
            </text>
        </svg>
    </div>

    <div class="centrar">
    <form action="../controlador/comprobarUsuario.php" method="post">
        <table>
            <tr>
                <td class="izq">
                    <label for="username">Usuario:</label>
                </td>
                <td class="der">
                    <input class="input" type="text" name="username" placeholder="Usuario" required>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <label for="password">Contraseña:</label>
                </td>
                <td class="der">
                    <input class="input" type="password" name="password" placeholder="Contraseña" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="testbutton" type="submit">Iniciar Sesión</button>
                </td>
            </tr>
        </table>
    </form>

    <form action="registro.php" method="get">
        <table>
            <tr>
                <td colspan="2">
                    <button class="testbutton" type="submit">Registrarse</button>
                </td>
            </tr>
        </table>
    </form>
    </div>


</body>
</html>
