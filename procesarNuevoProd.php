 <?php
require_once __DIR__.'/includes/Producto.php';
?>

 <!DOCTYPE>
<html>
<head>
	<title>Procesar Nuevo Producto</title>
</head>
<body>
	<?php
	include("includes/comun/cabecera.php");
	?>
<?php
	$nombre= htmlspecialchars(strip_tags($_POST['nombre']));
	$descripcion= htmlspecialchars(strip_tags($_POST['descripcion']));
	$precio= $_POST['precio'];
	//$imagen= $_POST['imagen'];
	$xs= $_POST['XS'];
	$s= $_POST['S'];
	$m= $_POST['M'];
	$l= $_POST['L'];
	$xl= $_POST['XL'];
	
	if(isset($nombre) && isset($precio)){
		$db = @mysqli_connect('localhost', 'root', '', 'laquintacaja');
		$producto = new Producto("",$nombre,$descripcion,$precio,$xs,$s,$m,$l,$xl);
		Producto::crea($nombre, $descripcion, $precio, $xs, $s, $m, $l, $xl);
		
	}
	else{
		$error = 'Alguno de los campos obligatorios no ha sido introducido.';
		include ("anadirProd.php");
	}

?>
	<div id="contenedor">

	<h1>Producto añadido correctamente</h1>

	<?php
	include("includes/comun/pie.php");
	?>
</div> 
</body>
</html> 