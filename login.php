<?php

//require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/FormularioLogin.php';

$form = new FormularioLogin();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Login';

$contenidoPrincipal = <<<EOS
$htmlFormLogin
EOS;

require __DIR__.'/includes/plantilla.php';