<?php
use es\ucm\fdi\aw\Usuario;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Usuario.php';

$id = $_SESSION['id'];

if (isset($_POST["premium"])) {
   $usuario = Usuario::buscaPorID($id);
	$usuario->hazPremium();
	$_SESSION['rol'] = $usuario->getRol();
	header("Location: suscripcion.php");
}

$tituloPagina = 'Hazte Premium';
include("includes/comun/menuIzqCuenta.php");

$contenidoPrincipal = <<<EOS
	<div class ="hazte-premium">
		<h3>Hazte premimum</h3>
		<p>¿Estás seguro que quieres hacerte premium?</p>
		<form method="post">
            <button type="submit" name="premium">Hazte premium</button>
        </form> 
        <form method="post" action='suscripcion.php'>
            <button type="submit" name="volver">Volver</button>
        </form> 
	</div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>
