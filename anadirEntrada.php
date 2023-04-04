<?php
require_once __DIR__.'/includes/configuracion.php';

	$tituloPagina = 'Nueva Entrada';
    if (isset($_SESSION['admin']) && $_SESSION['admin']) {
       //Se crea un formulario de nueva entrada y se gestiona
	$form = new es\ucm\fdi\aw\FormularioNuevaEntrada();
    $form->setAutor($_SESSION['id']);
	$htmlFormNEntr = $form->gestiona();

	$contenidoPrincipal = '';
	//Se muestran los campos del formulario en la vista
	$contenidoPrincipal .= <<<EOS
	$htmlFormNEntr
	EOS;
    } 
    else{ //si no es usuario admin
        $tituloPagina = "Error";
        $contenidoPrincipal .= <<<EOS
        <h2> Debes ser administrador para añadir una nueva entrada </h2>
        EOS;
      }
	

require __DIR__.'/includes/plantillas/plantillaFormulario.php';