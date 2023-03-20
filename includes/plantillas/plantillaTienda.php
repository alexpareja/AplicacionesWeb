<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $tituloPagina ?></title>
	<link rel="stylesheet" type="text/css" href="css/tienda.css">
	<meta charset="UTF-8">
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
