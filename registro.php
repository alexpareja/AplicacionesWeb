<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/registro.css" rel="stylesheet" type="text/css">
    <title>La Quinta Caja Registro</title>
</head>
<body>
<div id="contenedor">
    <?php
    include("includes/comun/cabecera.php");
    ?>
    <div id="registro-form">
    <form action="procesarRegistro.php" method="post">
    <fieldset>
        <legend>Registrar Usuario</legend>
        <div>
            <p><label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div></p>
        <div>
            <p><label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required></p>
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
            <input type="text" id="direccion" name="direccion" required></p>
        </div>
        <div>
            <p><input type="checkbox" id="terms" name="terms" required>
            <label for="terms" class="terminos">Acepto los <a href="terminosycondiciones.php">términos y condiciones</a></label></p>
        </div>
        <div>
            <button type="submit">Registrar</button>
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