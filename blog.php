<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Blog';

$contenidoPrincipal = <<<EOS
<div id="blog">
	<h class="titulo1">Una caja </h>
	<h class="titulo2">de blogs</h>

	<div id="rectangulo">
		<a href="entradaBlog.php"><p class="t1">Películas' box</p></a>
		<p class="t2">¿Cansado de ver las mismas pelis? Te recomendamos nuestra selección ganadora de los Premios Oscar</p>
		<p class="t3">LUCERO SOLANGE ABREGÚ REÁTEGUI</p>
	</div>
	<div id="etiqueta"></div>

	<div id="rectangulo">
		<a href="entradaBlog.php"><p class="t1">Novedades en cajas</p></a>
		<p class="t2">Entérate de las nuevas cajas que están por venir</p>
		<p class="t3">SERGIO ATIENZA FUERTES</p>
	</div>
	<div id="etiqueta"></div>

	<div id="rectangulo">
		<a href="entradaBlog.php"><p class="t1">Reciclaje en la moda</p></a>
		<p class="t2">Todo lo que puedes hacer con imaginación y siendo eco-friendly con cajas</p>
		<p class="t3">MADALINA ELENA BASCA</p>
	</div>
	<div id="etiqueta"></div>
</div>

EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>
