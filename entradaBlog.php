<?php
include_once ("includes/configuracion.php");

$contenidoPrincipal = <<<EOS
<div id="entrada">
EOS; 

if (isset($_SESSION['admin']) && $_SESSION['admin']) {
	$contenidoPrincipal .= <<<EOS
			<ul class='botones'>
				<li>
					<form action='editarEntrada.php'>
						<button type="submit">Editar Entrada</button>
					</form>
				</li>
			</ul>
	EOS;} 

if(isset($_GET['id']) && !empty($_GET['id'])) {
$id=$_GET ["id"];
$blog=es\ucm\fdi\aw\Blog::buscaPorId($id);  
if($blog)
{
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
    <p>Escrito por $nombreAutor</p>
    </div>
    <div id="comments">
    <h3>Comentarios</h3>
    <ul>
    <!--aquí se incluirán los comentarios, sacados de la bbdd-->
    </ul>
    </div>
    EOS;
}
else{ //si no se encuentra el producto
  $tituloPagina = "Entrada no encontrada";
  $contenidoPrincipal .= <<<EOS
  <h2> No se encuentra la entrada</h2>
  EOS;
}
}
else{ //si no está definido parámetro id en GET
  $tituloPagina = "Error de búsqueda";
  $contenidoPrincipal .= <<<EOS
  <h2> Se ha producido un error </h2>
  EOS;
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>
