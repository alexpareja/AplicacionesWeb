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
$contenidoPrincipal .= <<<EOS
    <div class="pago">
    <h2>Resumen de compra</h2>
    <ul class="resumen-pago">
    EOS;
foreach ($cart_products as $product) {
    $precioTotal = $product['price'] * $product['cantidad'];
    $talla = strtoupper($product['size']);
    $contenidoPrincipal .= <<<EOS
    <li>
        <strong>{$product['name']} ({$talla})</strong>
        <br>
        Precio unitario: {$product['price']} €
        <br>
        Cantidad: {$product['cantidad']}
        <br>
        Precio total: {$precioTotal} €
    </li>
EOS;
}


$contenidoPrincipal .= <<<EOS
    </ul>
	
    <fieldset class="fieldset-cupon">
		<legend> Introduce tu codigo de descuento:	</legend>
		<input type="text" id="codigo_cupon" class="cupon-input" name="codigo_cupon">
		<p id="mensaje_error"></p>
		<p id="mensaje_cupon"></p>
		<button type="button" id="validar_cupon">Validar cupón</button>
	</fieldset>
	
    <div class="total-price">
        <p>Total a pagar: <span id="total_compra">$total_price </span> €</p>
        <form method="post">
            <button type="submit" name="pay">Pagar</button>
        </form>
    </div>
</div>
EOS;
// Vaciar el carrito de compras
if (isset($_POST['pay'])) {
    header('Location: pagoConfirmado.php');
    exit;
}

// Generar la plantilla
require __DIR__.'/includes/plantillas/plantilla.php';