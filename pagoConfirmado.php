<?php
require_once __DIR__.'/includes/configuracion.php';


$tituloPagina = 'Pago confirmado';

$idUsuario = $_SESSION['id'];
if(isset($_SESSION['cupon_descuento'])){
	$descuento = $_SESSION['cupon_descuento'];
}else{
	$descuento = 0;
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        foreach ($product as $size => $item) {
            if (is_array($item)) {
				$total = $item['price'] * $item['cantidad'];
                $compra = es\ucm\fdi\aw\Compra::crea($idUsuario, $item['id'], strtolower($item['size']), $item['cantidad'], $total, $descuento);
            }
        }
    }
	unset($_SESSION['cart']);
    unset($_SESSION['cupon_descuento']);
}

$contenidoPrincipal = '<div class="confirm">';
$contenidoPrincipal .= <<<EOS
    <h1>La compra ha sido realizada</h2>
    <form method="get" action="index.php">
        <button type="submit">Aceptar</button>
    </form>
EOS;
$contenidoPrincipal .= '</div>';

require __DIR__.'/includes/plantillas/plantilla.php';
?>