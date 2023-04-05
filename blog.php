<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Blog';

$contenidoPrincipal = <<<EOS
	<div id="blog">
EOS;

//Se muestran los botones de añadir y eliminar entrada en caso de que el usuario de la sesion sea administrador
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
	$contenidoPrincipal .= <<<EOS
		<ul class='botonesBlog'>
			<li>
				<form action='agregarEntrada.php'>
					<button id="entAdd">Agregar entrada</button>
				</form>
			</li>
			<li>
				<form action='eliminarEntrada.php'>
					<button id="entDel">Eliminar entrada</button>
				</form>
			</li>
		</ul>
	EOS;
}


//Se muestran las entradas del blog
$blog = new es\ucm\fdi\aw\Periodico();
$contenidoPrincipal .= $blog->entradasEnBlog();
$contenidoPrincipal .= <<<EOS
	</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
