<?php
require_once __DIR__.'/includes/configuracion.php';


	$tituloPagina = 'Compras';
	//Se muestran la tabla con las compras realizadas hasta el momento de la base de datos de compras
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
	<div id="tienda" class="tienda">
		<ul class='botones'>
		<li>
			<button id="boton-filtros" type="submit" onclick="mostrarMenu()">Mostrar filtros</button>
		</li>
		<li>
		<form action="tienda.php">
			<button type="submit">Volver a la tienda</button>
		</form>
		</li>
		
		</ul>
		<h2 class="titulo1">Compras</h2>
		<h2 class="titulo2">de La Quinta Caja</h2>
	EOS;
	$compras = es\ucm\fdi\aw\Compra::getAllCompras();
	$contenidoPrincipal .= es\ucm\fdi\aw\Compra::mostrarTablaCompras($compras);

	$contenidoPrincipal .= <<<EOS
		</div>	
	EOS;
require __DIR__.'/includes/plantillas/plantillaTienda.php';
