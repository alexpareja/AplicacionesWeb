<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title><?= $tituloPagina ?></title>
</head>
<body>
<div id="contenedor">
<?php
include("includes/comun/cabecera.php");
?>
	<main>
		<article>
			<?= $contenidoPrincipal ?>
		</article>
	</main>
<?php
  include("includes/comun/pie.php");
?>
</div>
</body>
</html>
