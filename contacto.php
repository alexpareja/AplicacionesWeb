<?php

require_once __DIR__.'/includes/configuracion.php';

$form = new es\ucm\fdi\aw\FormularioContacto();
$htmlFormContacto = $form->gestiona();

$tituloPagina = 'Contacto';

$contenidoPrincipal = <<<EOS
$htmlFormContacto
EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';