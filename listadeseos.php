<?php
require_once __DIR__.'/includes/configuracion.php';
$tituloPagina = 'Lista de deseos';
$contenidoPrincipal = '';

$contenidoPrincipal = <<<EOS
<div id="lista-deseos">
    <h2>Lista de deseos</h2>
    <div id="imagen">
        <img class="img-deseos" src="img/b_PDeseos.png" alt="Imagen de la lista de deseos">
    </div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>