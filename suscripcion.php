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
        <p>Información sobre la cuenta premium:</p>
        <ul>
          <li>Ventajas de usuario La Quinta Caja Free.</li>
          <li>10% de descuento en todas las compras.</li>
          <li>Caja gratuita de forma mensual</li>
        </ul>
        <h3>Precio: 7,99€</h3>
        <a href="hacersePremium.php" class="boton-suscripcion">Hacerse Premium</a> 
      </div>
    </div>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h2>La Quinta Caja Free</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta gratuita:</p>
        <ul>
          <li>Comprar en La Quinta Caja.</li>
          <li>Acceso a la zona Mi Cuenta (favoritos, ver compras realizadas, perfil y plan de suscripción).</li>
          <li>Dejar comentarios en los productos de la tienda y entradas del blog.</li>
        </ul>
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
        <p>Información sobre la cuenta premium:</p>
        <ul>
          <li>Ventajas de usuario La Quinta Caja Free.</li>
          <li>10% de descuento en todas las compras.</li>
          <li>Caja gratuita de forma mensual</li>
        </ul>
        <h3>Precio: 7,99€</h3>
      </div>
    </div>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h2>La Quinta Caja Free</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta gratuita:</p>
        <ul>
          <li>Comprar en La Quinta Caja.</li>
          <li>Acceso a la zona Mi Cuenta (favoritos, ver compras realizadas, perfil y plan de suscripción).</li>
          <li>Dejar comentarios en los productos de la tienda y entradas del blog.</li>
        </ul>
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
        <p>Información sobre la cuenta premium:</p>
        <ul>
          <li>Ventajas de usuario La Quinta Caja Free.</li>
          <li>10% de descuento en todas las compras.</li>
          <li>Caja gratuita de forma mensual</li>
        </ul>
        <h3>Precio: 7,99€</h3>
      </div>
    </div>
    <div class="suscripcion-contenedor">
      <div class="cabecera-free">
        <h2>La Quinta Caja Free</h2>
      </div>
      <div class="cuenta">
        <p>Información sobre la cuenta gratuita:</p>
        <ul>
          <li>Comprar en La Quinta Caja.</li>
          <li>Acceso a la zona Mi Cuenta (favoritos, ver compras realizadas, perfil y plan de suscripción).</li>
          <li>Dejar comentarios en los productos de la tienda y entradas del blog.</li>
        </ul>
      </div>
    </div>
  </div>
EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>
