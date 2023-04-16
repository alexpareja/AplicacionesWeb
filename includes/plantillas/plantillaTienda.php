<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/tienda.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="js/codigo.js"></script>
	<title><?= $tituloPagina ?></title></head>
<body>
<div id="contenedor">
<?php
require(dirname(__DIR__).'/comun/cabecera.php');
require(dirname(__DIR__).'/comun/menuIzqTienda.php');

?>
	<main>
		<article>
			<?= $contenidoPrincipal ?>
		</article>
	</main>
<?php
require(dirname(__DIR__).'/comun/pie.php');
?>
</div>
</body>
</html>
