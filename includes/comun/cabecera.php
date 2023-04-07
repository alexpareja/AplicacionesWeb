<header id="cabecera">
	<div class="contenedor-flex">
		<div class="oculto">
			<input type="checkbox" name="" id="menu-icono"/>
			<label for="menu-icono">
				<img src="img/menu.png" class="menu" alt="Imagen Menu">
			</label>
			<nav class="paginas">
				<ul>
					<li><a href="tienda.php">Tienda</a></li>
					<li><a href="blog.php">Blog</a></li>
					<li><a href="sobrenosotros.php">Nosotros</a></li>
				</ul>
			</nav>
		</div>
		<div class="principal">
			<a href="index.php"><img src="img/logo.png" class="logo" alt="Imagen Logo"></a>
			<a href="index.php" class="letras">LA QUINTA CAJA</a>
		</div>
		<div class="iconos">
			<ul>
				<li><a href="faqs.php"><img src="img/ayuda.png" class="ayuda" alt="Imagen ayuda"></a></li>
				<li><a href="carrito.php"><img src="img/carrito.png" class="carrito" alt="Imagen carrito"></a></li>

				<?php
					if(!isset($_SESSION["login"])){
						echo "<li><a href='login.php'><img src='img/login.png' class='iniciar' alt='Imagen Iniciar'></a></li>";
					}
					else{
						echo "<li><a href='miCuenta.php'><img src='img/cuenta.png' class='cuenta' alt='Imagen Cuenta'></a></li>";
						echo "<li><a href='logout.php'><img src='img/logout.png' class='iniciar' alt='Imagen Cerrar'></a></li>";
					}
				?>
			</ul>
		</div>
	</div>
</header>

