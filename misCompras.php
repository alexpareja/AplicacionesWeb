<?php
require_once __DIR__.'/includes/configuracion.php';


	$tituloPagina = 'Mis Compras';
	//Se muestran la tabla con las compras realizadas por el usuario hasta el momento de la base de datos de compras
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
	<div id="tienda">
		<h2>Compras</h2>
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
	EOS;
	$usuario = $_SESSION['id'];
	$compras = es\ucm\fdi\aw\Compra::getAllComprasUsuario($usuario);
	$contenidoPrincipal .= es\ucm\fdi\aw\Compra::mostrarTablaCompras($compras);

	$contenidoPrincipal .= <<<EOS
		</div>	
	EOS;
require __DIR__.'/includes/plantillas/plantillaTienda.php';