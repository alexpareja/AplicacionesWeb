<?php
require_once __DIR__.'/includes/Producto.php';
require_once __DIR__.'/includes/Tienda.php';


	$tituloPagina = 'Tienda';
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
		<div id='tienda'>
	EOS;
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
	$contenidoPrincipal .= <<<EOS
			<ul class='botones'>
				<li>
					<form action='compras.php'>
						<button type="submit">Compras</button>
					</form>
				</li>
				<li>
					<form action='anadirProd.php'>
						<button type="submit"> Añadir Producto</button>
					</form>
				</li>
			</ul>
	EOS;
	}
	$tienda = new Tienda();
	$contenidoPrincipal .= $tienda->productosEnTienda();

require __DIR__.'/includes/plantillas/plantillaTienda.php';
	
