<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title><?= $tituloPagina ?></title>
    <link rel="stylesheet" type="text/css" href="css/tienda.css" />
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
