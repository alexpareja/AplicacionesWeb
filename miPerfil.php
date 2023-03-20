<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Perfil';
$contenidoPrincipal = '';

    $nombre = $_SESSION['nombre'];
    $apellido1 = $_SESSION['apellido1'];
    $apellido2 = $_SESSION['apellido2'];
    $email = $_SESSION['email'];
    $direccion = $_SESSION['direccion'];

    $contenidoPrincipal = <<<EOS
        <div id="cabecera-perfil">
            <h2>Mi perfil</h2>
            <p>Aquí puedes encontrar tus datos personales</p>
            <br>
        </div>
        <div id="info-perfil">
            <h3>Información personal</h3>
            <br>
            <p class ="negrita">$nombre $apellido1 $apellido2</p>
            <p>$email</p>
            <p>$direccion</p>
        </div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>