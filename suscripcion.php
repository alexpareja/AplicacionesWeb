<?php
require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Suscripción';
include("includes/comun/menuIzqCuenta.php");

if ($_SESSION['rol'] == 'U' || $_SESSION['rol'] == 'A') {
  $contenidoPrincipal = <<<EOS
    <div class="suscripcion-contenedor">
      <div class="cabecera-premium">
        <h4>La Quinta Caja Premium</h4>
      </div>
      <div class="cuenta-premium">
        <p>Información sobre la cuenta premium</p>
        <a href="hacersePremium.php" class="boton-suscripcion">Hacerse Premium</a>
      </div>
    </div>
    <br>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h4>La Quinta Caja Free</h4>
      </div>
      <div class="cuenta-gratuita">
        <p>Información sobre la cuenta gratuita</p>
      </div>
    </div>
EOS;
} else if ($_SESSION['rol'] == 'P') {
  $contenidoPrincipal = <<<EOS
  <div class="suscripcion-contenedor">
      <div class="cabecera-premium">
        <h4>La Quinta Caja Premium</h4>
      </div>
      <div class="cuenta-premium">
        <p>Información sobre la cuenta premium</p>
      </div>
    </div>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h4>La Quinta Caja Free</h4>
      </div>
      <div class="cuenta-gratuita">
        <p>Información sobre la cuenta gratuita</p>
        <a href="darseDeBaja.php" class="boton-baja">Darse de baja</a>
      </div>
    </div>
    <br>
EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>
