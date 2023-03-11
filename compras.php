<!DOCTYPE html>
<html lang="es">
    <head>
    <title>La Quinta Caja</title>
    <link href="css/compras.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
  </head>
  <body>
	<?php
		require("includes/comun/cabecera.php");
	?>
	
	<div id="tienda">
			
	<?php
		require("includes/comun/menuIzqTienda.php");
		
	?>
	<h2>Compras</h2>
	<form action="tienda.php">
		<input class="botonTienda" type="submit" value="Tienda" />
	</form>
	
		<div id="compras">
				<table class="compras">
					<tr>
						<th>Fecha</th>
						<th>Usuario</th>
						<th>Productos</th>
						<th>Total</th>
					</tr>
					<tr>
						<td>10/03/2023</td>
						<td>alexpareja</td>
						<td>Caja Premium</td>
						<td>59,99€</td>
					</tr>
					<tr>
						<td>11/03/2023</td>
						<td>helenarious</td>
						<td>Caja Básica</td>
						<td>29,99€</td>
					</tr>					
				</table>
		</div>
	</div>
	
	<?php
		include("includes/comun/pie.php");
	?>
  </body>
</html>