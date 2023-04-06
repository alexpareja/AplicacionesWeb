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
        <img class='imgListaDeseos' src="img/listadeseos.png" alt="Imagen Favoritos">
      </div>
      <br>
      <p>Mis favoritos</p>
    </a>
  </li>
  <li>
    <a href="miPerfil.php">
      <div class="imagen">
        <img class='imgMiPerfil' src="img/miPerfil.png" alt="Imagen Mi perfil">
      </div>
      <br>
      <p>Mi perfil</p>
    </a>
  </li>
  <li>
    <a href="misCompras.php">
      <div class="imagen">
        <img class='imgMisCompras' src="img/misCompras.png" alt="Imagen Mis compras">
      </div>
      <br>
      <p>Mis compras</p>
    </a>
  </li>
</ul>

EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>