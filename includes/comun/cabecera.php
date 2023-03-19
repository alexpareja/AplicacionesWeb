<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<meta charset="utf-8">
	<title>Cabecera</title>

</head>

<div id="cabecera">
	
	<div class="contenedor">
		<a href="tienda.php" class="tienda">Tienda </a>
		<a href="blog.php" class="blog">Blog </a>
		<a href="sobrenosotros.php" class="nosotros">Nosotros </a>
		<img class="logo" src="img/logo.png">
		<a href="inicio.php"><h1 class="titulo">LA QUINTA CAJA</h1></a>
		<a href="faqs.php"><img class="ayuda" src="img/ayuda.jpg"></a>
		<a href="carrito.php"><img class="carrito" src="img/carrito.jpg"></a>
		<a href="miCuenta.php"><img class="cuenta" src="img/cuenta.jpg"></a>
		

	<?php
		if(!isset($_SESSION["login"])){
			echo "<a href='login.php'><img class='iniciar' src='img/login.jpg'></a>";
		}	
		else{
			echo "<a href='logout.php'><img class='iniciar' src='img/logout.jpg'></a>";
		}
	?>

	</div>
		
</div>