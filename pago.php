<?php
require_once __DIR__.'/includes/configuracion.php';

$tituloPagina = 'Pago';
$contenidoPrincipal = '';

// Verificar que se ha hecho una compra antes de acceder a la página de pago
if (!isset($_SESSION['cart'])) {
    header('Location: carrito.php');
    exit;
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

// Obtener el contenido del carrito de compras
$cart_products = array();
$total_price = 0;
foreach ($_SESSION['cart'] as $product) {
    foreach ($product as $size => $item) {
        if (is_array($item)) {
            $total_price += $item['price'] * $item['cantidad'];
            $cart_products[] = $item;
        }
    }
}



// Mostrar los productos del carrito con su información
$contenidoPrincipal .= '<div class="pago-content">';
$contenidoPrincipal .= '<h2>Resumen de compra</h2>';
$contenidoPrincipal .= '<ul>';
foreach ($cart_products as $product) {
    $contenidoPrincipal .= '<li>';
    $contenidoPrincipal .= '<strong>' . $product['name'] . ' - Talla: ' . $product['size'] . '</strong>';
    $contenidoPrincipal .= '<br>';
    $contenidoPrincipal .= 'Precio unitario: ' . $product['price'] . ' €';
    $contenidoPrincipal .= '<br>';
    $contenidoPrincipal .= 'Cantidad: ' . $product['cantidad'];
    $contenidoPrincipal .= '<br>';
    $contenidoPrincipal .= 'Precio total: ' . $product['price'] * $product['cantidad'] . ' €';
    $contenidoPrincipal .= '</li>';
}
$contenidoPrincipal .= <<<EOS
    </ul>
    <div class="total-price">
        <p>Total a pagar: $total_price €</p>
        <form method="post">
            <button type="submit" name="pay">Pagar</button>
        </form>
    </div>
</div>
EOS;
$contenidoPrincipal .= '</div>';

// Vaciar el carrito de compras
if (isset($_POST['pay'])) {
    header('Location: pagoConfirmado.php');
    exit;
}

// Generar la plantilla
require __DIR__.'/includes/plantillas/plantilla.php';