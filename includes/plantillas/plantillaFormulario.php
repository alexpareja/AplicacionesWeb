<!DOCTYPE html>
<html  lang="es">
<head>
		<meta charset="UTF-8">
    <title><?= $tituloPagina ?></title>
    <link rel="stylesheet" type="text/css" href="css/formulario.css"> 
    <script type="text/javascript" src="js/codigo.js"></script>
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