<?php
require_once __DIR__.'/includes/configuracion.php';


	$tituloPagina = 'Compras';
	//Se muestran la tabla con las compras realizadas hasta el momento de la base de datos de compras
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
	<div id="tienda">
		<h2>Compras</h2>
		<form action="tienda.php">
			<button type="submit">Volver a la tienda</button>
		</form>
	EOS;
	$compras = es\ucm\fdi\aw\Compra::getAllCompras();
	$contenidoPrincipal .= es\ucm\fdi\aw\Compra::mostrarTablaCompras($compras);

	$contenidoPrincipal .= <<<EOS
		</div>	
	EOS;
require __DIR__.'/includes/plantillas/plantillaTienda.php';
