<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Blog';

$contenidoPrincipal = <<<EOS
<div class="blog">
	<section class="cabeceraBlog">
		<h2 class="tituloBlog">
			&lt;BLOG&gt;
		</h2>
		<h3 class="subtituloBlog">
			Bienvenido a L5C
		</h3>
		<p class="contenidoBlog">
			Conoce nuestro blog, donde nuestro equipo creativo
			ha seleccionado cuidadosamente cada artículo para
			que puedas conocerlos mejor y descubrir todo lo que
			tienen que ofrecer
		</p>
EOS;

//Se muestran los botones de añadir y eliminar entrada en caso de que el usuario de la sesion sea administrador
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
	$contenidoPrincipal .= <<<EOS
	<a href="anadirEntrada.php" class="btnBlog">Añadir entrada</a>
	EOS;
}

$contenidoPrincipal .= <<<EOS
	</section>
	<section class="titBlog">
		<h2 class="subtituloBlog">
			ÚLTIMAS NOTICIAS
		</h2>
	</section>
	EOS;

//Se muestran las entradas del blog
$blog = new es\ucm\fdi\aw\Periodico();
$contenidoPrincipal .= $blog->entradasEnBlog();

$contenidoPrincipal .= <<<EOS
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
