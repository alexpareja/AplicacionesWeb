<?php

require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/FormularioRegistro.php';

$form = new FormularioRegistro();
$htmlFormRegistro = $form->gestiona();

$tituloPagina = 'Registro';

$contenidoPrincipal = <<<EOS
$htmlFormRegistro
EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';