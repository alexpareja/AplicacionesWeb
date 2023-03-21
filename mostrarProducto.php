<?php
include_once ("includes/Producto.php");
include_once ("includes/configuracion.php");
include_once ("includes/FormularioAnadirCarrito.php");

$contenidoPrincipal = <<<EOS
<div id="producto">
EOS; 

if (isset($_SESSION['admin']) && $_SESSION['admin']) {
	$contenidoPrincipal .= <<<EOS
			<ul class='botones'>
				<li>
					<form action='editarProd.php'>
						<button type="submit">Editar Producto</button>
					</form>
				</li>
			</ul>
	EOS;} 

if(isset($_GET['id']) && !empty($_GET['id'])) {
$id=$_GET ["id"];
$producto=Producto::buscaPorId($id);  
if($producto)
{
$imagenProducto = "img/producto_" . $producto->getId() . ".png";
$nombre=$producto->getNombre();
$tituloPagina = $nombre;
$desc=$producto->getDescripcion();
$form = new FormularioAnadirCarrito();
$form->setProducto($producto);
$htmlFormRegistro = $form->gestiona();
$contenidoPrincipal .= <<<EOS
    <img class='imgProducto' src="$imagenProducto" alt='Imagen del producto'>
    <h2>$nombre</h2>
    <p>$desc</p>
    $htmlFormRegistro
    </div>
    <div id="comments">
    <h3>Comentarios</h3>
    <ul>
    <!--aquí se incluirán los comentarios, sacados de la bbdd-->
    </ul>
    </div>
    EOS;
}
else{ //si no se encuentra el producto
  $tituloPagina = "Producto no encontrado";
  $contenidoPrincipal .= <<<EOS
  <h2> No se encuentra el producto </h2>
  EOS;
}
}
else{ //si no está definido parámetro id en GET
  $tituloPagina = "Error de búsqueda";
  $contenidoPrincipal .= <<<EOS
  <h2> Se ha producido un error </h2>
  EOS;
}
require __DIR__.'/includes/plantillas/plantilla.php';