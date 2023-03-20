<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Cuenta';
$contenidoPrincipal = '';

if(isset($_SESSION['login'])) {
    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['email'];
    $direccion = $_SESSION['direccion'];

    $contenidoPrincipal = <<<EOS
        <div id="sesion">
            <p>Hola,</p>
            <h2>$nombre</h2>
            <br>
            <p>Aquí puedes encontrar toda tu información:</p>
            <div id="botones-cuenta">
                <button type="submit" name="listadeseos"><a href="listadeseos.php">Mi lista de deseos</a></button>
                <button type="submit" name="miperfil"><a href="miPerfil.php">Mi perfil</a></button>
                <button type="submit" name="logout"><a href="logout.php">Cerrar Sesión</a></button>
            </div>
        </div>
EOS;
} else {
    $contenidoPrincipal = <<<EOS
        <div id="no-sesion">
            <button type="submit" name="login"><a href="login.php">Iniciar Sesión</a></button>
            <button type="submit" name="registro"><a href="registro.php">Registrarse</a></button>
        </div>
EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>