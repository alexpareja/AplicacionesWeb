<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Blog';

$contenidoPrincipal = <<<EOS
<div class="blog">
	<div class="cabeceraBlog">
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
	</div>
	<div="contenidoBlog-total">
		<div class="filBlog">
			<h2 class="titFB">Filtros</h2>
			<p class="letrasFB">Ordenado por:</p>
			<select id="ordenar-blogs" name="ordenar-blogs" onchange="ordenarBlogs()">
				<option value="nombreAB">Nombre (A -> Z)</option>
				<option value="nombreZB">Nombre (Z -> A)</option>
			</select>
			<p class="letrasFB">Buscador de productos:</p>
			<input type="text" id="campo-busqueda-blog" class="campo-busqueda-blog" placeholder="Buscar...">
			<p class="letrasFB">Categoría:</p>
			<ul class ="checkfiltros">
				<li><input type="checkbox" name="cat" value="Sostenibilidad" onclick="filtrarBlogs()">Sostenibilidad</li>
				<li><input type="checkbox" name="cat" value="Moda" onclick="filtrarBlogs()">Moda</li>
				<li><input type="checkbox" name="cat" value="Actualidad" onclick="filtrarBlogs()">Actualidad</li>
			</ul>
			<button type="submit" class="botones-filtros-blog" onclick="quitarFiltrosBlog()">Resetear filtros</button>
			<button type="submit" class="botones-filtros-blog" onclick="mostrarFiltrosBlog()">Ocultar filtros</button>
		</div>
		<div class="contenidoArticulos">
			<section class="titBlog">
				<h2 class="subtituloBlog">
					ÚLTIMAS NOTICIAS
				</h2>
				<button id="btnFB" type="submit" onclick="mostrarFiltrosBlog()" class="btnFB"><i class="fas fa-sliders-h white"></i></button>
			</section>
	EOS;

//Se muestran las entradas del blog
$blog = new es\ucm\fdi\aw\Periodico();
$contenidoPrincipal .= $blog->entradasEnBlog();

$contenidoPrincipal .= <<<EOS
		</div>
	</div>


</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
