<?php
require_once __DIR__.'/includes/Compra.php';
require_once __DIR__.'/includes/configuracion.php';


$tituloPagina = 'Tienda';
$contenidoPrincipal = '';

$contenidoPrincipal .= <<<EOS
<div id="tienda">
		<h2>Compras</h2>
		<form action="tienda.php">
			<button type="submit">Volver a la tienda</button>
		</form>
EOS;
	$compras = Compra::getAllCompras();
	$contenidoPrincipal .= Compra::mostrarTablaCompras($compras);

$contenidoPrincipal .= <<<EOS
		</div>	
EOS;
require __DIR__.'/includes/plantillas/plantillaTienda.php';
