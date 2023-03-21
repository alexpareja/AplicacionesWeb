<?php
require_once __DIR__.'/includes/Compra.php';
require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Pago confirmado';

$idUsuario = $_SESSION['id'];
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        foreach ($product as $size => $item) {
            if (is_array($item)) {
                $Compra = Compra::crea($idUsuario, $item['id'], strtolower($item['size']), $item['cantidad'], $item['price']);
            }
        }
    }
}

$contenidoPrincipal = '';
$contenidoPrincipal .= <<<EOS
    <h2>La compra ha sido realizada</h2>
    <form method="get" action="inicio.php">
        <button type="submit">Aceptar</button>
    </form>
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>