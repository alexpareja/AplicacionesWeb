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
	
	if(isset($nombre) && isset($precio) && isset($_FILES['imagen'])){
		$imagen = $_FILES['imagen'];
		$db = @mysqli_connect('localhost', 'root', '', 'laquintacaja');
		
		$producto = Producto::crea($nombre, $descripcion, $precio, $xs, $s, $m, $l, $xl);
		

			if($imagen['type'] == 'image/jpeg' || $imagen['type'] == 'image/png') {
				$nombreImagen = 'producto_'.$producto->getID().'.png'; // Nombre de la imagen que se guardará
				$ruta = 'img/'.$nombreImagen; // Ruta donde se guardará la imagen

				move_uploaded_file($imagen['tmp_name'], $ruta); // Guardar la imagen en el servidor
				echo 'La imagen se ha guardado correctamente.';
			} else {
				echo 'El archivo seleccionado no es una imagen válida.';
			}	
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