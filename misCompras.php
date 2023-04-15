<?php
require_once __DIR__.'/includes/configuracion.php';


	$tituloPagina = 'Mis Compras';
	$nombre = $_SESSION['nombre'];
	//Se muestran la tabla con las compras realizadas por el usuario hasta el momento de la base de datos de compras
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