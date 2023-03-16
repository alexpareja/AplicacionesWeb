<?php

require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/FormularioLogin.php';

$form = new FormularioLogin();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Login';

$contenidoPrincipal = <<<EOS
$htmlFormLogin
EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';