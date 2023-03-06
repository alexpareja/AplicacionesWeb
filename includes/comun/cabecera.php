<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<meta charset="utf-8">
	<title>Cabecera</title>
</head>


<div id="cabecera">
	<h1>La Quinta Caja</h1>

	<?php
		if(!isset($_SESSION["login"])){
			echo "<div class='saludo'>Usuario desconocido. <a href='login.php'>Login</a>	</div>";
		}	
		else{
			echo "<div class='saludo'>Bienvenido, {$_SESSION['nombre']}. <a href='logout.php'>Logout</a></div>";
		}
	?>
		
			<ul class='horizontal'>
				<li><a href="index.php">Index</a></li>
				<li><a href="tienda.php">Tienda</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="faqs.php">FAQs</a></li>
				<li><a href="contacto.php">Contacto</a></li>
				<li><a href="carrito.php">Carrito</a></li>

			</ul>
		
		
</div>