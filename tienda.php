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
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 1</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 2</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 3</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 4</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 5</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 6</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 7</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 8</a>
				</li>
				<li>
					<a href="producto.php"><img class="imgProducto" src="img/producto_id.png" alt="Imagen de Producto" /></br>Producto 9</a>
				</li>
			</ul>		
		</div>
	</div>
	
	<?php
		include("includes/comun/pie.php");
	?>
  </body>
</html>