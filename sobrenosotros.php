<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Nosotros';

$contenidoPrincipal = <<<EOS
<div id="nosotros">
	<div id="nosotros-texto">
		<p class="t1">Conoce nuestro</p>
		<p class="t2">Equipo Creativo</p>
		<p><br><br>Cuando creamos esta web, nos planteamos la idea de "colgar" la historia de #LaQuintaCaja.</p>
		<p>La historia de cómo habíamos llegado hasta aquí, de cuáles habían sido nuestras motivaciones y cuáles nuestras inquietudes, en definitiva, de abrirnos a vosotros.</p>
		<p> La Quinta Caja tiene poca ciencia, pero mucha ilusión. Es la ilusión de los que piensan que el mundo es un sitio apasionante pero mejorable. Un lugar donde hay mucho por hacer y mucho por aportar. Un espacio donde prime el respeto a las ideas ajenas y la puesta firme por los valores...</p>
		<p>En definitiva, un lugar sostenible lleno de mucho color. Queremos gente apasionada, queremos gente ecologista... te queremos a ti!! ¡¡¿Nos acompañas?!!</p>
		<p><br><br>#beLaQuintaCaja #bedifferent</p>
		<button onclick="window.location.href='contacto.php'" id="boton">Contacta con nosotros</button>
	</div>
	<div id="nosotros-imagen">
		<img src="img/nosotros.jpg" class="foto">
	</div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>