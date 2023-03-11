<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<title>La Quinta Caja Login</title>
</head>
<body>
<div id="contenedor">
	<?php
	include("includes/comun/cabecera.php");
	?>
	<div id="login-form">
		<form action="procesarLogin.php" method="post">
			<fieldset>
			<legend>Iniciar Sesión</legend>
			<div>
                <label for="email">Email:</label>
				<input id="email" type="text" name="nombreUsuario" />
            </div>
            <div>
                <label for="password">Contraseña:</label>
				<input id="password" type="password" name="password" />
            </div>
				<?php if (isset($error)): ?>
   				<p class = "error-message"><?php echo $error; ?></p>
  				<?php endif; ?>
  			<div>
				<button type="submit">Entrar</button>
			</div>
				<p class="no-account">No tengo cuenta. <a href="registro.php">Regístrate aquí</a></p>
			</fieldset>
		</form>
	</div>
	<?php
	include("includes/comun/pie.php");
	?>
</div> 
</body>
</html>