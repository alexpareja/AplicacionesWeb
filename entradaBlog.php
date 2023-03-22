<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'entradaBlog';
$contenidoPrincipal = '';
$contenidoPrincipal .= <<<EOS
<div id="entradaBlog">
  <h2>Título del post</h2>
  <div id="entrada_contenido">
    <div id="entrada_texto">
      <p>Contenido del post</p> <!--el contenido se sacará de la bbdd, mediante una clase entradaSA, que nos devuelva toda la info de la entrada-->
    </div>
    <div id="entrada_imagen">
      <img src="img/b_PPost.png" alt="Imagen del post">
    </div>
  </div>
  <div id="entradas_links">
    <h3>Otras entradas del blog</h3>
    <ul>
      <li><a href="#">Enlace 1</a></li>
      <li><a href="#">Enlace 2</a></li>
      <li><a href="#">Enlace 3</a></li>
    </ul>
  </div>
  <div id="comments">
    <h3>Comentarios</h3>
    <!--aquí se incluirán los comentarios, sacados de la bbdd-->
  </div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
