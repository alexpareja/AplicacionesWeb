<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Login';

$contenidoPrincipal = <<<EOS
<div class="contenedor-cajas">
	<a href="registro.php">
    	<img src="img/caja-normal.jpg" class="caja1">
    </a>
    <a href="tienda.php">
    	<img src="img/caja-especial.jpg" class="caja2">
    </a>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';