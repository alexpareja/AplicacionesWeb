<?php
require_once __DIR__.'/includes/configuracion.php';

if (isset($_GET['codigo_cupon'])) {
    $codigo_cupon = $_GET['codigo_cupon'];
	$cupon = es\ucm\fdi\aw\Cupon::buscaPorCodigo($codigo_cupon);
	echo json_encode(parseaCupon($cupon));
}

	function parseaCupon($cupon){
		
		if($cupon !== false){
			return array(
				'valido' => true,
				'id' => $cupon->getId(),
				'descuento' => $cupon->getDescuento(),
				'fechaExpiracion' => $cupon->getFechaExpiracion(),
			);
		}else{
			return array(
				'valido' => false
			);
		}
	}
?>