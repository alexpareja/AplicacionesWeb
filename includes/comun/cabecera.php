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
						<a class="bolsa">Tu bolsa de la compra está vacía</a>
						<a class="linea-carrito"></a>
						<a class="total">Total: <?php echo $_SESSION['precioTotal']; ?>€</a>
						<?php
					} else {
						?>
						<a class="bolsa">Tienes <?php echo $_SESSION['numprodcarrito']; echo $mensaje; ?> en el carrito</a>
						<a class="linea-carrito"></a>
                		<a class="total">Total: <?php echo $_SESSION['precioTotal']; ?>€</a>
						<?php
					}
					?>
                </span>
                </li>

				<?php
					if(!isset($_SESSION["login"])){
                        ?>
						<li><a href='login.php'><i class='fas fa-sign-in-alt'></i></a>
                        <span class="tooltip">
                        <a href="login.php"><button>Iniciar sesión</button></a>
                        <a class= "enlace-sus" href='registro.php'>¿No estás registrado? Regístrate aquí</a>
                        </span>
                        </li>
                        <?php
					}
					else{
                        ?>
						<li><a href='miCuenta.php'><i class='fas fa-user'></i></a>
                        <span class="tooltip">
                        <a class= "enlace" href='miCuenta.php'>Mi cuenta</a>
                        <a class= "enlace" href='listadeseos.php'>Favoritos</a>
                        <?php
                        if($_SESSION['rol'] === "U") {
                        ?>
                        <a class= "enlace-sus" href='suscripcion.php'>¿Aún no eres premium? Suscríbete aquí</a>
                        <?php
                        }
                        ?>
                        <a class= "enlace-sus" href='logout.php'>Cerrar sesión</a>
                        </span>
                        </li>
                        <?php
					}
				?>
			</ul>
		</div>
	</div>
</header>

