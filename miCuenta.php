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
        <div class="imagen-contenedor">
            <img class='imgListaDeseos' src="img/listadeseos.jpg" alt="Imagen Favoritos">
            <p>Favoritos</p>
        </div>
    </a>
  </li>
  <li>
    <a href="miPerfil.php">
        <div class="imagen-contenedor">
            <img class='imgMiPerfil' src="img/miPerfil.jpg" alt="Imagen Mi perfil">
            <p>Mi Perfil</p>
        </div>
    </a>
  </li>
  <li>
    <a href="misCompras.php">
        <div class="imagen-contenedor">
            <img class='imgMisCompras' src="img/misCompras.png" alt="Imagen Mis compras">
            <p>Mis Compras</p>
        </div>
    </a>
  </li>
</ul>

<ul class="listaMiCuenta">
  <li>
    <a href="contacto.php">
        <div class="imagen-contenedor">
            <img class='imgContacto' src="img/contacto.png" alt="Imagen Contacto">
            <p>Contacto</p>
        </div>
    </a>
  </li>
  <li>
    <a href="miPerfil.php">
        <div class="imagen-contenedor">
            <img class='imgMiPerfil' src="img/miPerfil.jpg" alt="Imagen Mi perfil">
        </div>
    </a>
  </li>
  <li>
    <a href="logout.php">
        <div class="imagen-contenedor">
            <img class='imgLogout' src="img/logoutMiCuenta.jpg" alt="Imagen Logout">
            <p>Cerrar Sesión</p>
        </div>    
    </a>
  </li>
</ul>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>