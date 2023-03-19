<?php

require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/FormularioNuevoProducto.php';

$form = new FormularioNuevoProducto();
$htmlFormNProd = $form->gestiona();

$tituloPagina = 'Nuevo Producto';
$contenidoPrincipal = '';


$contenidoPrincipal .= <<<EOS
$htmlFormNProd
EOS;

require __DIR__.'/includes/plantillas/plantillaFormulario.php';