<?php
require_once __DIR__.'/includes/Compra.php';
require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Pago confirmado';

$idUsuario = $_SESSION['id'];
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        foreach ($product as $size => $item) {
            if (is_array($item)) {
                $compra = Compra::crea($idUsuario, $item['id'], strtolower($item['size']), $item['cantidad'], $item['price']);
            }
        }
    }
    unset($_SESSION['cart']);
}

$contenidoPrincipal = '<div class="pago-content">';
$contenidoPrincipal .= <<<EOS
    <h2>La compra ha sido realizada</h2>
    <form method="get" action="inicio.php">
        <button type="submit">Aceptar</button>
    </form>
EOS;
$contenidoPrincipal .= '</div>';

require __DIR__.'/includes/plantillas/plantilla.php';
?>