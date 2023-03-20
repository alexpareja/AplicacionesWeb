<?php

require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/FormularioContacto.php';

$form = new FormularioContacto();
$htmlFormContacto = $form->gestiona();

$tituloPagina = 'Contacto';

$contenidoPrincipal = <<<EOS
$htmlFormContacto
EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';