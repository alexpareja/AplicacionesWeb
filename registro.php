<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>La Quinta Caja Registro</title>
</head>
<body>
<div id="contenedor">
    <?php
    include("includes/comun/cabecera.php");
    ?>
    <div id="contenido">
    <form action="procesarRegistro.php" method="post">
    <fieldset>
        <legend>Registro Usuario</legend>
        <div>
            <p><label for="nombre">Nombre:</label>
            <input type="nombre" id="nombre" name="nombre" required>
        </div></p>
        <div>
            <p><label for="apellidos">Apellidos:</label>
            <input type="apellidos" id="apellidos" name="apellidos" required></p>
        </div>
        <div>
            <p><label for="email">Email:</label>
            <input type="email" id="email" name="email" required></p>
        </div>
        <div>
            <p><label for="password1">Contraseña:</label>
            <input type="password" id="password1" name="password1" required></p>
        </div>
        <div>
            <p><label for="password2">Confirmar contraseña:</label>
            <input type="password" id="password2" name="password2" required></p>
        </div>
        <div>
            <p><label for="direccion">Dirección:</label>
            <input type="direccion" id="direccion" name="direccion" required></p>
        </div>
        <div>
            <p><input type="checkbox" id="terms" name="terms" required>
            <label for="terms">Acepto los <a href="terminosycondiciones.php">términos y condiciones</a></label></p>
        </div>
        <div>
            <button type="submit">Registrarse</button>
        </div>
    </fieldset>
    </form>
    </div>
    <?php
    include("includes/comun/pie.php");
    ?>
</div>
</body>
</html>
</html>