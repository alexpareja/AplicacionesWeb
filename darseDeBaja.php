<?php
use es\ucm\fdi\aw\Usuario;
use es\ucm\fdi\aw\CajaSuscripcion;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/CajaSuscripcion.php';

$id = $_SESSION['id'];

if (isset($_POST["baja"])) {
   $usuario = Usuario::buscaPorID($id);
	$usuario->hazEstandar();
	$caja = CajaSuscripcion::buscaPorUsuario($id);
	$caja->borra($caja->getId());
	$_SESSION['rol'] = $usuario->getRol();
	header("Location: suscripcion.php");
}

$tituloPagina = 'Darse de Baja';

$contenidoPrincipal = <<<EOS
	<div class ="hazte-premium">
		<h3>Cancelar premium</h3>
		<p>¿Estás seguro que quieres darte de baja de La Quinta Caja Premium?</p>
		<form method="post">
            <button type="submit" name="baja" class="cancel">Sí, cancelar</button>
        </form> 
        <form method="post" action='suscripcion.php'>
            <button type="submit" name="volver" class="volver">Volver</button>
        </form> 
	</div>
EOS;

require __DIR__.'/includes/plantillas/plantillaPerfil.php';
?>
