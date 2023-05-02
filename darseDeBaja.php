<?php
use es\ucm\fdi\aw\Usuario;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Usuario.php';

$id = $_SESSION['id'];

if (isset($_POST["baja"])) {
   $usuario = Usuario::buscaPorID($id);
	$usuario->hazEstandar();
	$_SESSION['rol'] = $usuario->getRol();
	header("Location: suscripcion.php");
}

$tituloPagina = 'Darse de Baja';
include("includes/comun/menuIzqCuenta.php");

$contenidoPrincipal = <<<EOS
	<div class ="hazte-estandar">
		<h3>Hazte premimum</h3>
		<p>¿Estás seguro que quieres darte de baja de La Quinta Caja Premium?</p>
		<form method="post">
            <button type="submit" name="baja">Darse de baja</button>
        </form> 
        <form method="post" action='suscripcion.php'>
            <button type="submit" name="volver">Volver</button>
        </form> 
	</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
