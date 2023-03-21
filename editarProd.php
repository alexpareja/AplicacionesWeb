<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Editar producto';
$contenidoPrincipal = '';

$contenidoPrincipal = <<<EOS
<div id="editar-prod">
    <h2>Editar producto</h2>
    <img class="img-editarp" src="img/b_EditarProducto.png" alt="Imagen de editar producto">
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>