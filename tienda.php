<?php
require_once __DIR__.'/includes/Producto.php';



	$tituloPagina = 'Tienda';
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
		<div id="tienda">
	EOS;
	if (!isset($_SESSION["admin"])) {
	$contenidoPrincipal .= <<<EOS
			<ul class="botones">
				<li>
					<form action="compras.php">
						<button type="submit">Compras</button>
					</form>
				</li>
				<li>
					<form action="anadirProd.php">
						<button type="submit"> Añadir Producto</button>
					</form>
				</li>
			</ul>
	EOS;
	}
	$contenidoPrincipal .= <<<EOS
		<h2>Productos</h2>
			<div id="productos">
				<ul class = "productos">
	EOS;
$productos = Producto::getTienda();
		foreach($productos as $prod){
			$link = 'mostrarProducto.php?id='.$prod->getId();
			$src = 'img/producto_'.$prod->getId().'.png';
			$alt = 'Imagen de Producto '.$prod->getId();
			$nombre = $prod->getNombre();
	
			$contenidoPrincipal .= <<<EOS
					<li>
						<a href=$link>
						<img class="imgProducto" src=$src alt=$alt />
						</br>
						$nombre
						</a>
					</li>
			EOS;
		}
		$contenidoPrincipal .= <<<EOS
				</ul>		
				</div>
			</div>
		EOS;

require __DIR__.'/includes/plantillas/plantillaTienda.php';
	
