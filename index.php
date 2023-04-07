<?php

require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'La Quinta Caja';

$contenidoPrincipal = <<<EOS
<div id="inicio">

EOS;

if(isset($_SESSION['login'])){
	
	$contenidoPrincipal .= <<<EOS
	<a href="miCuenta.php">
    	<img src="img/caja-normal.jpg" alt="Imagen de la Caja normal" class="caja1">
    </a> 
	
EOS;
	
} else {
	$contenidoPrincipal .= <<<EOS
	<a href="registro.php">
    	<img src="img/caja-normal.jpg" alt="Imagen de la Caja normal" class="caja1">
    </a> 
	
EOS;
} 

$contenidoPrincipal .= <<<EOS
	<a href="tienda.php">
    	<img src="img/caja-especial.jpg" alt="Imagen de la Caja especial" class="caja2">
    </a>
	
</div>
EOS;


require __DIR__.'/includes/plantillas/plantilla.php';
?>