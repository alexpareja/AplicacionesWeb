<?php
require_once __DIR__.'/includes/Compra.php';
require_once __DIR__.'/includes/configuracion.php';
?>

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
			<button type="submit">Volver a la tienda</button>
		</form>
	<?php
	$compras = Compra::getAllCompras();
	echo Compra::mostrarTablaCompras($compras);
	?>

	</div>
	
	<?php
		include("includes/comun/pie.php");
	?>
  </body>
</html>