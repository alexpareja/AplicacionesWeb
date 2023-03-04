<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>La Quinta Caja Login</title>
</head>

<body>

<div id="contenedor">
	<?php
	include("includes/comun/cabecera.php");
	?>
	<div id="contenido">
		<form action="procesarLogin.php" method="POST">
			<fieldset>
			<legend>Usuario y contraseña</legend>
				<p><label>Email:</label> <input type="text" name="email" /></p>
				<p><label>Contraseña:</label> <input type="password" name="password" /></p>
				<button type="submit">Entrar</button>
				<p>No tengo cuenta. <a href="registro.php">Regístrate aquí</a></p>
			</fieldset>
		</form>
	</div>
	<?php
	include("includes/comun/pie.php");
	?>
</div> 
</body>
</html>