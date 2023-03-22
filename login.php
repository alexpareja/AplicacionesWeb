<?php

require_once __DIR__.'/includes/configuracion.php';

$form = new es\ucm\fdi\aw\FormularioLogin();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Login';

$contenidoPrincipal = <<<EOS
$htmlFormLogin
EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';