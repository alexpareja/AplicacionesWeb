<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Nosotros';

$contenidoPrincipal = <<<EOS
<div class="nosotros1">
	<h2 class="n1">Conoce nuestro</h2>
	<h2 class="n2">Equipo Creativo</h2>
</div>
<div class="nosotros2">
	<div class="nosotrosTexto">
		<p>
			Cuando creamos esta web, nos planteamos la idea de "colgar" la historia de #LaQuintaCaja.
			La historia de cómo habíamos llegado hasta aquí, de cuáles habían sido nuestras motivaciones y cuáles nuestras inquietudes, en definitiva, de abrirnos a vosotros.
			La Quinta Caja tiene poca ciencia, pero mucha ilusión. Es la ilusión de los que piensan que el mundo es un sitio apasionante pero mejorable. Un lugar donde hay mucho por hacer y mucho por aportar. Un espacio donde prime el respeto a las ideas ajenas y la puesta firme por los valores...
			En definitiva, un lugar sostenible lleno de mucho color. Queremos gente apasionada, queremos gente ecologista... te queremos a ti!! ¡¡¿Nos acompañas?!!
		</p>
	</div>
	<div class="nosotrosImagen">
		<img src="img/nosotros.jpg" alt="Imagen del equipo" class="nosotros">
	</div>
</div>
<div class="nosotros3">
	<p>#beLaQuintaCaja #bedifferent</p>
	<br>
	<button onclick="window.location.href='contacto.php'" id="nosotrosBoton">
		Contacta con nosotros
	</button>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>