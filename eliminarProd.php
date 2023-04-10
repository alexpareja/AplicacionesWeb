<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Eliminar Producto';
	$contenidoPrincipal = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id=$_GET ["id"];
	$producto=es\ucm\fdi\aw\Producto::buscaPorId($id);  
	if($producto)
	
	{
	
	Producto::borra($producto);
	
	$contenidoPrincipal .= <<<EOS
    <h2>El producto ha sido eliminado</h2>
    <form method="get" action="index.php">
        <button type="submit">Aceptar</button>
    </form>
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