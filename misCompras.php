<?php
require_once __DIR__.'/includes/configuracion.php';


	$tituloPagina = 'Mis Compras';
	$nombre = $_SESSION['nombre'];
	//Se muestran la tabla con las compras realizadas por el usuario hasta el momento de la base de datos de compras
	$contenidoPrincipal = '';
	$contenidoPrincipal .= <<<EOS
	<div id="tienda" class="tienda">
		<button id="boton-filtros" type="submit" onclick="mostrarMenu()" class="boton-filtros"><i class="fas fa-sliders-h white"></i></button>

		<form action="tienda.php">
			<button type="submit">Volver a la tienda</button>
		</form>
		
		<h2 class="titulo1">Mis compras</h2>
		<h2 class="titulo2">$nombre</h2>
	EOS;
	$usuario = $_SESSION['id'];
	$compras = es\ucm\fdi\aw\Compra::getAllComprasUsuario($usuario);
	$contenidoPrincipal .= es\ucm\fdi\aw\Compra::mostrarTablaComprasUsuario($compras);

	$contenidoPrincipal .= <<<EOS
		</div>	
	EOS;
require __DIR__.'/includes/plantillas/plantillaTienda.php';