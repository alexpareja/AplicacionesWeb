<?php
require_once __DIR__.'/includes/configuracion.php';


$tituloPagina = 'Eliminar confirmado';

$idUsuario = $_SESSION['id'];


$contenidoPrincipal = '<div class="confirm">';
$contenidoPrincipal .= <<<EOS
    <h1>El producto ha sido editado o eliminado con éxito. </h1>
	<h2>
	En caso de que existan compras con dicho producto, se ha reducido el stock a 0 y solo es visible para el administrador</h2>
	
   <form method="get" action="tienda.php">
        <button type="submit">Aceptar</button>
    </form>
	</div>
EOS;
$contenidoPrincipal .= '</div>';

require __DIR__.'/includes/plantillas/plantilla.php';
?>