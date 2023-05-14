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
	<div class="contenidoPer">
		<div class="filBlog">
			<h2 class="titFB">Filtros</h2>
			<p class="letrasFB">Ordenado por:</p>
			<select id="ordenar-blogs" name="ordenar-blogs" onchange="ordenarBlogs()">
				<option value="nombreAB">Nombre (A -> Z)</option>
				<option value="nombreZB">Nombre (Z -> A)</option>
			</select>
			<p class="letrasFB">Buscador de entradas:</p>
			<input type="text" id="campo-busqueda-blog" class="campo-busqueda-blog" placeholder="Buscar...">
			<p class="letrasFB">Categoría:</p>
			<ul class ="checkfiltros">
				<li data-categoria="sostenibilidad"><input type="checkbox" class="filtro-categoria" name="cat" value="sostenibilidad" onclick="filtrarBlogs()">Sostenibilidad</li>
				<li data-categoria="moda"><input type="checkbox" class="filtro-categoria" name="cat" value="moda" onclick="filtrarBlogs()">Moda</li>
				<li data-categoria="actualidad"><input type="checkbox" class="filtro-categoria" name="cat" value="actualidad" onclick="filtrarBlogs()">Actualidad</li>
			</ul>
			<button type="submit" class="botones-filtros-blog1" onclick="quitarFiltrosBlog()">Resetear filtros</button>
			<button type="submit" class="botones-filtros-blog2" onclick="mostrarFiltrosBlog()">Ocultar filtros</button>
		</div>
		<div class="contenidoArticulos">
			<div class="titBlog">
				<button id="btnFB" type="submit" onclick="mostrarFiltrosBlog()" class="btnFB"><i class="fas fa-sliders-h white"></i></button>
				<h2 class="subtituloBlog">
					ÚLTIMAS NOTICIAS
				</h2>
			</div>
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
