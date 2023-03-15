<?php
require_once __DIR__.'/includes/Producto.php';

?>
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
	
	<div id="tienda">
	<?php
		require("includes/comun/menuIzqTienda.php");
		
	?>
	<h2>Productos</h2>
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

		<div id="productos">
			<ul class = "productos">
				<?php
					$productos = Producto::getTienda();
					$i = 1;
					foreach($productos as $prod){
						//$prod = Producto::buscaPorId($i);
						echo
						'<li>
						<a href="mostrarProducto.php?id='.$prod->getId().'">
						<img class="imgProducto" src="img/producto_'.$prod->getId().'.png" alt="Imagen de Producto '.$prod->getId().'" />
						</br>'.
						$prod->getNombre().'
						</a>
						</li>';
						$i++;
					}
				?>
			</ul>
			
		</div>
	</div>
	
	<?php
		include("includes/comun/pie.php");
	?>
  </body>
</html>