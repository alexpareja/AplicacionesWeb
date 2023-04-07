<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $tituloPagina ?></title>
	<link rel="stylesheet" type="text/css" href="css/tienda.css">
	<script type="text/javascript" src="js/codigo.js"></script>
</head>
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
