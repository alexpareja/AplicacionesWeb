<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Cuenta';
$contenidoPrincipal = '';

if(isset($_SESSION['login'])) {
    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['email'];
    $direccion = $_SESSION['direccion'];

    $contenidoPrincipal .= <<<EOS
        <div id="sesión_iniciada">
            <h2>Mi Cuenta</h2>
            <p>Bienvenid@, $nombre</p>
            <p>Email: $email</p>
            <p>Dirección: $direccion</p>
            <button id="logout"><a href="logout.php">Cerrar Sesión</a></button>
        </div>
EOS;
} else {
    $contenidoPrincipal .= <<<EOS
        <div id="sesión_no_iniciada">
            <button id="login"><a href="login.php">Iniciar Sesión</a></button>
            <button id="registro"><a href="registro.php">Registrarse</a></button>
        </div>
EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>