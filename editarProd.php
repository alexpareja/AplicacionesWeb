<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Editar Producto';
	$contenidoPrincipal = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])) {
$id=$_GET ["id"];
$producto=es\ucm\fdi\aw\Producto::buscaPorId($id);  
if($producto)
{
	
	$imagenProducto = "img/producto_" . $producto->getId() . ".png";
	$nombre=$producto->getNombre();
	$tituloPagina = $nombre;
	$desc=$producto->getDescripcion();
	$precio=$producto->getPrecio();
	$form = new es\ucm\fdi\aw\FormularioEditarProducto();
	$form->setProducto($producto);
	$htmlFormNProd = $form->gestiona();


	//Se muestran los campos del formulario en la vist
	
	$contenidoPrincipal .= <<<EOS
	$htmlFormNProd
	EOS;
}

else{ //si no se encuentra el producto
  $tituloPagina = "Producto no encontrado";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> No se encuentra el producto </h2>
  EOS;
	}}
	
	else{ //si no está definido parámetro id en GET
  $tituloPagina = "Error de búsqueda";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> Se ha producido un error </h2>
  EOS;
}
	
require __DIR__.'/includes/plantillas/plantillaFormulario.php';