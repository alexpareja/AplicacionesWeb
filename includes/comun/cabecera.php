<?php
if($_SESSION['numprodcarrito'] == 1){
    $mensaje = " producto";
}
else{
    $mensaje = " productos";
}
?>
<header class="cabecera">
	<div class="contenedor-flex">
		<div class="oculto">
			<input type="checkbox" name="menu-icono" id="menu-icono">
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
			<a href="index.php" class="letras">LA QUINTA CAJA</a>
		</div>
		<div class="iconos">
			<ul>
				<li><a href="faqs.php"><i class="fas fa-question-circle"></i></a></li>
				<li><a href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
                <span class="tooltip" id="tooltip-carrito">
					<?php
					if ($_SESSION['numprodcarrito'] === 0){
						?>
						<p>Tu bolsa de la compra está vacía</p>
						<div class="linea-carrito"></div>
						<p>Total: <?php echo $_SESSION['precioTotal']; ?>€</p>
						<?php
					} else {
						?>
						<p>Tienes <?php echo $_SESSION['numprodcarrito']; echo $mensaje; ?> en el carrito</p>
						<div class="linea-carrito"></div>
                		<p>Total: <?php echo $_SESSION['precioTotal']; ?>€</p>
						<?php
					}
					?>
                </span>
                </li>

				<?php
					if(!isset($_SESSION["login"])){
						echo "<li><a href='login.php'><i class='fas fa-sign-in-alt'></i></a></li>";
					}
					else{
						echo "<li><a href='miCuenta.php'><i class='fas fa-user'></i></a></li>";
					}
				?>
			</ul>
		</div>
	</div>
</header>

