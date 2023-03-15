<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/anadirProd.css" rel="stylesheet" type="text/css">
	<title>La Quinta Caja Login</title>
</head>
<body>
<div id="contenedor">
	<?php
	include("includes/comun/cabecera.php");
	?>

	<div id="newP-form">
		<form action="procesarNuevoProd.php" method="post" enctype="multipart/form-data">
			<fieldset>
			<legend>Nuevo Producto</legend>
			<div>
                <p><label for="nombre">Nombre:</label></p>
				<p><input id="nombre" type="text" name="nombre" /></p>
            </div>
            <div>
                <p><label for="descripcion">Descripción:</label></p>
				<p><textarea id="descripcion" name="descripcion"></textarea></p>
            </div>
			<div>
                <p><label for="precio">Precio:</label></p>
				<p><input id="precio" type="number" step="0.01" min="0" name="precio"/></p>
            </div>
			<div>
                <p><label for="imagen">Imagen:</label></p>
				<p><input id="imagen" type="file" name="imagen"/></p>
            </div>
			<div>
                <p><label>Tallas en Stock:</label></p>
				<ul class="botones">
					<li>
						<label for="tallas">XS:</label>
						<input id="tallas" type="number" min="0" max="500" name="XS"/>
					</li>
					<li>
						<label for="tallas">S:</label>
						<input id="tallas" type="number" min="0" max="500" name="S"/>
					</li>
					<li>
						<label for="tallas">M:</label>
						<input id="tallas" type="number" min="0" max="500" name="M"/>
					</li>
					<li>
						<label for="tallas">L:</label>
						<input id="tallas" type="number" min="0" max="500" name="L"/>
					</li>
					<li>
						<label for="tallas">XL:</label>
						<input id="tallas" type="number" min="0" max="500" name="XL"/>
					</li>
				<ul>
            </div>
			
  			<div>
				<ul class= "botones">
					<li><button type="submit">Añadir Producto</button></form></li>

				<li><form action="tienda.php">
					<button type="submit">Volver a la tienda</button>
				</form>
				</li>
				<ul>
			</div>
			</fieldset>
	</div>
	<?php
	include("includes/comun/pie.php");
	?>
</div> 
</body>
</html>