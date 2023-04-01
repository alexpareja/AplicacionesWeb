<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Cuenta';
$contenidoPrincipal = '';

if(isset($_SESSION['login'])) {
    $nombre = $_SESSION['nombre'];

    $contenidoPrincipal = <<<EOS
        <div id="sesion">
            <p>Hola,</p>
            <h2>$nombre</h2>
            <br>
            <p>Aquí puedes encontrar toda tu información:</p>
        </div>
        <div id="botones-cuenta">
            <a href="listadeseos.php">Mi lista de deseos</a>
            <a href="miPerfil.php">Mi perfil</a>
            <a href="misCompras.php">Mis compras</a>
        </div>


EOS;
} else {
    $contenidoPrincipal = <<<EOS
        <div id="no-sesion">
            <a href="login.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
        </div>

EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>