<?php
use es\ucm\fdi\aw\Usuario;
use es\ucm\fdi\aw\CajaSuscripcion;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/CajaSuscripcion.php';

$id = $_SESSION['id'];

if (isset($_POST["premium"])) {
   $usuario = Usuario::buscaPorID($id);
	$usuario->hazPremium();
	$fecha = date('Y-m-d H:i:s', strtotime('+1 month'));
	$caja = CajaSuscripcion::crea($id, $fecha);
	$_SESSION['rol'] = $usuario->getRol();
	header("Location: suscripcion.php");
}

$tituloPagina = 'Hazte Premium';

$contenidoPrincipal = <<<EOS
	<div class ="hazte-premium">
		<h3>Hazte premium</h3>
		<p>¿Estás seguro que quieres hacerte premium?</p>
		<form method="post">
            <button type="submit" name="premium" class="premium" onclick="aceptarCompra()">Hazte premium</button>
        </form> 
        <form method="post" action='suscripcion.php'>
            <button type="submit" name="volver" class="volver">Volver</button>
        </form> 
	</div>
EOS;

require __DIR__.'/includes/plantillas/plantillaPerfil.php';
?>
