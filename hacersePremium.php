<?php
use es\ucm\fdi\aw\Usuario;
use es\ucm\fdi\aw\CajaSuscripcion;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/CajaSuscripcion.php';

$id = $_SESSION['id'];
$tallaSeleccionada = '';

if (isset($_POST["premium"])) {
    $usuario = Usuario::buscaPorID($id);
    $usuario->hazPremium();
    $fecha = date('Y-m-d H:i:s', strtotime('+1 month'));
    $tallaSeleccionada = $_POST['size'];
    $caja = CajaSuscripcion::crea($id, $fecha, $tallaSeleccionada);
    $_SESSION['rol'] = $usuario->getRol();
    header("Location: suscripcion.php");
}

$tituloPagina = 'Hazte Premium';

$contenidoPrincipal = <<<EOS
	<div class="hazte-premium">
		<h3>Hazte premium</h3>
		<p>¿Estás seguro que quieres hacerte premium?</p>
		<div class="tallas">
	    <p>Seleccione su talla para la caja gratuita mensual:</p>
	    <label class="talla" for="xs">
	        <input type="radio" id="xs" name="size" value="xs" onclick="seleccionarTalla('xs')">
	        <span> XS </span>
	    </label>
	    <label class="talla" for="s">
	        <input type="radio" id="s" name="size" value="s" onclick="seleccionarTalla('s')">
	        <span> S </span>
	    </label>
	    <label class="talla" for="m">
	        <input type="radio" id="m" name="size" value="m" onclick="seleccionarTalla('m')">
	        <span> M </span>
	    </label>
	    <label class="talla" for="l">
	        <input type="radio" id="l" name="size" value="l" onclick="seleccionarTalla('l')">
	        <span> L </span>
	    </label>
	    <label class="talla" for="xl">
	        <input type="radio" id="xl" name="size" value="xl" onclick="seleccionarTalla('xl')">
	        <span> XL </span>
	    </label>
		</div>
		<form method="post">
		    <input type="hidden" id="tallaSeleccionada" name="size" value="">
		    <button type="submit" name="premium" class="premium" onclick="aceptarCompra()">Hazte premium</button>
		</form>
		<form method="post" action='suscripcion.php'>
			<button type="submit" name="volver" class="volver">Volver</button>
		</form> 
	</div>
EOS;


require __DIR__.'/includes/plantillas/plantillaPerfil.php';
?>
