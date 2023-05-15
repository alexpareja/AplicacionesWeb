<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Editar Entrada';
	$contenidoPrincipal = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id=$_GET ["id"];
	$entrada=es\ucm\fdi\aw\Blog::buscaPorId($id);  
		if($entrada)
		{
	
		$imagenEntrada = "img/blog" . $entrada->getId() . ".png";
		$nombre=$entrada->getTitulo();
		$tituloPagina = $nombre;
		$desc=$entrada->getDescripcion();
		$contenido=$entrada->getContenido();
		$form = new es\ucm\fdi\aw\FormularioEditarEntrada();
		$form->setEntrada($entrada);
		$htmlFormEEntr= $form->gestiona();


		//Se muestran los campos del formulario en la vista
	
		$contenidoPrincipal .= <<<EOS
		$htmlFormEEntr
		EOS;
		}
		else
		{ //si no se encuentra la entrada
$tituloPagina = "Entrada no encontrada";
$contenidoPrincipal .= <<<EOS
<h2 class="error"> Se ha producido un error </h2>
EOS;
		}
	}	
	else{ //si no está definido parámetro id en GET
  $tituloPagina = "Error de búsqueda";
  $contenidoPrincipal .= <<<EOS
  <h2 class="error"> Se ha producido un error </h2>
  EOS;
}
	
require __DIR__.'/includes/plantillas/plantillaFormulario.php';