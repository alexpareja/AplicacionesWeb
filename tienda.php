<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Tienda';
	
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
		<div id='tienda' class='tienda'>
	EOS;
	//Se muestran los botones de control en caso de que el usuario de la sesion sea administrador
	
	$contenidoPrincipal .= <<<EOS
					<button id="boton-filtros" type="submit" onclick="mostrarMenu()" class="boton-filtros"><i class="fas fa-sliders-h white"></i></button>
				
	EOS;
	
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
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
			
	EOS;
}
	$contenidoPrincipal .= <<<EOS
		</ul>
		<h2 class="titulo1">Productos</h2>
		<h2 class="titulo2">de La Quinta Caja</h2>
	EOS;
	//Se muestran los porductos de la tienda
	$tienda = new es\ucm\fdi\aw\Tienda();
	$contenidoPrincipal .= $tienda->productosEnTienda();

	if($_SESSION['rol'] == 'A' || $_SESSION['rol'] == 'P') {
		$contenidoPrincipal .= <<<EOS
		<br>
		<br>
			<h2 class="titulo1">Productos Premium</h2>
			<h2 class="titulo2">de La Quinta Caja</h2>
		EOS;
		$contenidoPrincipal .= $tienda->productosEnTiendaPremium();
	}

	$contenidoPrincipal .= <<<EOS
		</div>

	EOS;

require __DIR__.'/includes/plantillas/plantillaTienda.php';
	
