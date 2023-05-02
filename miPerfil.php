<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Perfil';
$contenidoPrincipal = '';

$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido1 = $_SESSION['apellido1'];
$apellido2 = $_SESSION['apellido2'];
$email = $_SESSION['email'];
$direccion = $_SESSION['direccion'];

include("includes/comun/menuIzqCuenta.php");

if ($_SESSION['rol'] == 'U' || $_SESSION['rol'] == 'A') {
  $suscripcionCabecera = '<h4>La Quinta Caja Free</h4>';
  $suscripcionContenido = '<p>Información sobre la cuenta gratuita</p><a href="suscripcion.php" class="boton-suscripcion">Suscribirse</a>';
} elseif ($_SESSION['rol'] == 'P') {
  $suscripcionCabecera = '<h4>La Quinta Caja Premium</h4>';
  $suscripcionContenido = '<p>Información sobre la cuenta premium</p><a href="suscripcion.php" class="boton-baja">Darse de baja</a>';
}

$contenidoPrincipal = <<<EOS
  <div class="perfil-contenedor">
    <h2>Perfil</h2>
    <h3>Información personal</h3>
    <br>
    <div>
      <label>Nombre</label>
      <span>$nombre</span>
    </div>
    <div>
      <label>Apellidos</label>
      <span>$apellido1 $apellido2</span>
    </div>
    <div>
      <label>Correo electrónico</label>
      <span>$email</span>
    </div>
    <div>
      <label>Dirección</label>
      <span>$direccion</span>
    </div>
    <div class="botones">
      <form action='editarUsuario.php'>
        <input type="hidden" name="id" value="$id">
        <button type="submit" class="boton-edicion">Editar</button>
      </form>
    </div>
  </div>
  <br>
  <div class="suscripcion-contenedor">
    <h3>Plan suscripción</h3>
    <div class="cabecera-suscripcion">
      $suscripcionCabecera
    </div>
    <div class="info-suscripcion">
      $suscripcionContenido
    </div>
  </div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
