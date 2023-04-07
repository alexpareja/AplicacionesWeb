<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Mi Cuenta';
$contenidoPrincipal = '';

$nombre = $_SESSION['nombre'];

$contenidoPrincipal = <<<EOS
<div id="sesion">
  <p>Hola,</p>
  <h2>$nombre</h2>
  <br>
  <p>Aquí puedes encontrar toda tu información:</p>
</div>

<ul class="listaMiCuenta">
  <li>
    <a href="listadeseos.php">
      <div class="imagen">
        <div class="imagen-contenedor">
            <img class='imgListaDeseos' src="img/listadeseos.jpg" alt="Imagen Favoritos">
        </div>
      </div>
    </a>
  </li>
  <li>
    <a href="miPerfil.php">
      <div class="imagen">
        <div class="imagen-contenedor">
            <img class='imgMiPerfil' src="img/miPerfil.jpg" alt="Imagen Mi perfil">
        </div>>
      </div>
    </a>
  </li>
  <li>
    <a href="misCompras.php">
      <div class="imagen">
        <div class="imagen-contenedor">
            <img class='imgMisCompras' src="img/misCompras.png" alt="Imagen Mis compras">
        </div>
      </div>
    </a>
  </li>
</ul>

<div id="contacto">
    <p>¿Tienes algún problema?</p>
    <h2>Contacta con nosotros</h2>
    <a href="contacto.php">
    <div class="imagen-contacto">
        <img class='imgContacto' src="img/contacto.png" alt="Imagen Contacto">
    </div>
    </a>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>