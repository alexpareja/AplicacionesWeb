<div id="cabecera">
	
	<div class="contenedor">
		<a href="tienda.php" class="tienda">Tienda </a>
		<a href="blog.php" class="blog">Blog </a>
		<a href="sobrenosotros.php" class="nosotros">Nosotros </a>
		<img class="logo" src="img/logo.png" alt="Imagen Logo">
		<a href="inicio.php"><h1 class="titulo">LA QUINTA CAJA</h1></a>
		<a href="faqs.php"><img class="ayuda" src="img/ayuda.jpg" alt="Imagen FAQs"></a>
		<a href="carrito.php"><img class="carrito" src="img/carrito.jpg" alt="Imagen Carrito"></a>
		<a href="miCuenta.php"><img class="cuenta" src="img/cuenta.jpg" alt="Imagen Cuenta"></a>
		

	<?php
		if(!isset($_SESSION["login"])){
			echo "<a href='login.php'><img class='iniciar' src='img/login.jpg' alt='Imagen Iniciar'></a>";
		}	
		else{
			echo "<a href='logout.php'><img class='iniciar' src='img/logout.jpg' alt='Imagen Cerrar'></a>";
		}
	?>

	</div>
		
</div>
