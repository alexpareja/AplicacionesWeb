<!DOCTYPE html>
<html lang="es">
    <head>
    <title>La Quinta Caja</title>
    <link href="css/tienda.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
  </head>
  <body>
	<?php
		require("includes/comun/cabecera.php");
	?>
	
	<div id=tienda>
			<h2>Productos</h2>

	<?php
		require("includes/comun/menuIzqTienda.php");
		
	?>
		<div id="productos">
			<ul class = "productos">
				<li>Producto 1</li>
				<li>Producto 2</li>
				<li>Producto 3</li>
				<li>Producto 4</li>
				<li>Producto 5</li>
				<li>Producto 6</li>
			</ul>		
		</div>
	</div>
	
	<?php
		include("includes/comun/pie.php");
	?>
  </body>
</html>