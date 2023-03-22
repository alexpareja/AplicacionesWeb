<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Nuevo Producto';
	//Se crea un formulario de nuevo producto y se gestiona
	$form = new es\ucm\fdi\aw\FormularioNuevoProducto();
	$htmlFormNProd = $form->gestiona();

	$contenidoPrincipal = '';
	//Se muestran los campos del formulario en la vista
	$contenidoPrincipal .= <<<EOS
	$htmlFormNProd
	EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';