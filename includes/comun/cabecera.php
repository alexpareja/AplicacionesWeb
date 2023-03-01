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
			<div id="páginas">
			<ul class='horizontal'>
				<li><a href="index.php">Index</a></li>
				<li><a href="detalles.php">Detalles</a></li>
				<li><a href="bocetos.php">Bocetos</a></li>
				<li><a href="miembros.php">Miembros</a></li>
				<li><a href="planificacion.php">Planificación</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</div>
		
</div>