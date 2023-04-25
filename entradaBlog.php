<?php
include_once ("includes/configuracion.php");

$contenidoPrincipal = <<<EOS
<div class="entrada">
EOS; 


if(isset($_GET['id']) && !empty($_GET['id'])) {
$id=$_GET ["id"];
$blog=es\ucm\fdi\aw\Blog::buscaPorId($id);  
if($blog)
{
  if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    $contenidoPrincipal .= <<<EOS
        <ul class='botones'>
          <li>
            <form action='editarEntrada.php'>
            <input type="hidden" name="id" value="$id">
              <button type="submit">Editar Entrada</button>
            </form>
          </li>
        </ul>
    EOS;} 

$imagenEntrada = "img/blog_" . $blog->getId() . ".png";
$titulo=$blog->getTitulo();
$tituloPagina = $titulo;
$cont=$blog->getContenido();
$autor = es\ucm\fdi\aw\Usuario::buscaPorId($blog->getAutor()); 
$nombreAutor=$autor->getNombre();
$contenidoPrincipal .= <<<EOS
    <img class='imgEntrada' src="$imagenEntrada" alt='Imagen de la entrada'>
    <h2>$titulo</h2>
    <p>$cont</p>
    <p class="autor">Escrito por $nombreAutor</p>
    </div>
    <div class="comments">
    <h3>Comentarios</h3>
    EOS;
    if (!isset($_SESSION['login'])) {
    $contenidoPrincipal .= <<<EOS
    <h5>Inicia sesion para enviar comentarios</h5>
    EOS;
  }
  else{
    $contenidoPrincipal .= <<<EOS
    <form class="comentariosBlog-form" method="post">
    <textarea class="comentarioBlog" name="comentarioBlog" required placeholder="Escribe aquí tu comentario"></textarea>
    <button type="submit">Enviar comentario</button>
    </form>
    EOS;
  }
  $comentarios= es\ucm\fdi\aw\ComentariosBlog::buscaPorEntrada($blog->getId());
  if($comentarios){
      foreach ($comentarios as $comentario) {
        $contenidoPrincipal.= mostrarComentario($comentario);
      }
    }
}
else{ //si no se encuentra el producto
  $tituloPagina = "Entrada no encontrada";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> No se encuentra la entrada</h2>
  EOS;
}
}
else{ //si no está definido parámetro id en GET
  $tituloPagina = "Error de búsqueda";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> Se ha producido un error </h2>
  EOS;
}


//funcion para mostrar los comentarios
function mostrarComentario($comentario) {
  $autorComentario=es\ucm\fdi\aw\Usuario::buscaPorId($comentario->getUsuario())->getNombre();
  $idComentario=$comentario->getId();
  $contenidoComentario=$comentario->getContenido();
  $fechaComentario=$comentario->getFecha();
  $contenidoPrincipal="";
  $contenidoPrincipal .= <<<EOS
  <div class="comentario" idComentario="$idComentario">
  <div class="comentario-autor">$autorComentario</div>
  <div class="comentario-cuerpo">$contenidoComentario</div>
  <div class="comentario-fecha">$fechaComentario</div>
  <button class="comentario-responder">Responder</button>
  EOS;
  $respuestas=es\ucm\fdi\aw\ComentariosBlog::buscaPorRespuesta($comentario->getId());
  if ($respuestas) {
    $cantidadRespuestas = count($respuestas);
    $contenidoPrincipal .= <<<EOS
    <button class="comentario-mostrarRespuestas">Mostrar respuestas</button>
    <div class="respuestas">
    EOS;
    foreach ($respuestas as $respuesta){
      $contenidoPrincipal .= mostrarComentario($respuesta);
    }
    $contenidoPrincipal .= <<<EOS
    </div>
    EOS;
  }
  $contenidoPrincipal .= <<<EOS
  </div>
  EOS;
  return $contenidoPrincipal;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>
