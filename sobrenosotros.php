<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Nosotros';

$contenidoPrincipal = <<<EOS

<div class="sobrenosotros">
	<div class="nosotros1">
		<h2 class="tituloNosotros">
			Sobre nosotros
		</h2>
		<figure class="fotoTitulo">
			<img src="img/nosotros.jpg" class="fotoTit" alt="Foto principal Sobre nosotros">
		</figure>
	</div>
	<div class="nosotros2">
		<p class="contenidoNosotros">
			Cuando creamos esta web, nos planteamos la idea de "colgar" la
			historia de #LaQuintaCaja.
		</p>
		<p class="contenidoNosotros">
			La historia de cómo habíamos llegado hasta aquí, de cuáles habían sido
			nuestras motivaciones y cuáles nuestras inquietudes, en definitiva, de
			abrirnos a vosotros.
		</p>
		<p class="contenidoNosotros">
			La Quinta Caja tiene poca ciencia, pero mucha ilusión. Es una ilusión
			de los que piensan que el mundo es un sitio apasionante pero mejorable.
			Un lugar donde hay mucho por hacer y mucho por aportar. Un espacio donde
			prime el respeto a las ideas ajenas y la puesta firme por los valores...
		</p>
		<p class="contenidoNosotros">
			En definitiva, un lugar sostenible lleno de mucho color. Queremos gente
			apasionada, queremos gente ecologista... ¡¡te queremos a ti!! ¡¡¿Nos 
			acompañas?!!
		</p>
		<br>
		<p class="contenidoNosotros">
			Para obtener más información sobre nuestro enfoque y trabajo, no dudes 
			en visitar nuestro blog.
		</p>
		<a href="blog.php" class="btnNosotros">Leer el blog</a>
	</div>
	<div class="nosotros3">
		<ul class="boxEquipo">
			<li class="numero1">6</li>
			<li class="palabra">compañeros de equipo</li>
		</ul>
		<ul class="boxPaises">
			<li class="numero2">10</li>
			<li class="palabra">Países</li>
		</ul>
		<ul class="boxUsuarios">
			<li class="numero3">20,000+</li>
			<li class="palabra">Usuarios</li>
		</ul>
	</div>
	<div class="nosotros4">
		<h2 class="tituloNosotros">
			Equipo
		</h2>
		<p class="contenidoNosotros">
			Estamos comprometidos a construir un equipo
			diverso y un ambiente de trabajo cómodo. Conoce
			al maravilloso equipo que está construyendo nuestras 
			cajas, y apoyando a nuestros clientes.
		</p>
		<div class="fotoNosotros">
			<img src="img/nos2.png" class="nos2" alt="Imagen 1 de nosotros">
			<img src="img/nos1.png" class="nos1" alt="Imagen 2 de nosotros">
		</div>
		<a href="contacto.php" class="btnNosotros">Conócenos mejor</a>
	</div>
	<div class="nosotros5">
		<p class="contenidoNosotros">
			Más de 20,000 personas como tú compra en La Quinta Caja
			para ayudar al medio ambiente
		</p>
		<a href="tienda.php" class="btnNosotros">Empieza ahora</a>
	</div>
</div>

EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>