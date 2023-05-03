<?php
require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Suscripción';
include("includes/comun/menuIzqCuenta.php");

if ($_SESSION['rol'] == 'U') {
  $contenidoPrincipal = <<<EOS
  <div class="tipos-suscripcion">
    <div class="suscripcion-contenedor">
      <div class="cabecera-premium">
        <h2>La Quinta Caja Premium</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta premium</p>
        <a href="hacersePremium.php" class="boton-suscripcion">Hacerse Premium</a> 
      </div>
    </div>
    <br>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h2>La Quinta Caja Free</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta gratuita</p>
      </div>
    </div>
  </div>
EOS;
} else if ($_SESSION['rol'] == 'P') {
  $contenidoPrincipal = <<<EOS
  <div class="tipos-suscripcion">
    <div class="suscripcion-contenedor">
      <div class="cabecera-premium">
        <h2>La Quinta Caja Premium</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta premium</p>
      </div>
    </div>
    <br>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h2>La Quinta Caja Free</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta gratuita</p>
        <a href="darseDeBaja.php" class="boton-baja">Cancelar premium</a>
      </div>
    </div>
  </div>
EOS;
} else if ($_SESSION['rol'] == 'A') {
  $contenidoPrincipal = <<<EOS
  <div class="tipos-suscripcion">
    <div class="suscripcion-contenedor">
      <div class="cabecera-premium">
        <h2>La Quinta Caja Premium</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta premium</p>
      </div>
    </div>
    <br>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h2>La Quinta Caja Free</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta gratuita</p>
      </div>
    </div>
  </div>
EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>
