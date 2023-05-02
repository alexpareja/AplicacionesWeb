<!DOCTYPE html>
<html  lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/plantilla.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
<<<<<<< HEAD
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/codigo.js"></script>
=======
	<script src="js/codigo.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
>>>>>>> cdab39b288c2e6b3425088cbe0a47854afe449cf
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
