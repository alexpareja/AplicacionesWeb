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
    <li>
        <strong>Subtotal: $total_price €</strong>
    </li>
EOS;
$descuentoPremium = 0;
if ($_SESSION['rol'] == 'P') {
    $descuentoPremium = $total_price * 0.1;
    $descuentoPremium = round($descuentoPremium, 2);
    $contenidoPrincipal .= <<<EOS
    <li>
        <strong>Descuento premium (10%): $descuentoPremium €</strong>
    </li>
    <li>
        <strong>Gastos de envío: Gratis</strong>
        <br>
        <p>*Gratis para suscriptores premium</p>
    </li>
EOS;
}
else{
    if($total_price>=30){
        $contenidoPrincipal .= <<<EOS
    <li>
        <p class="strong">Gastos de envío: Gratis</p>
        <br>
        <p>*Gratis para compras igual o superiores a 30€</p>
    </li>
EOS;
    }
    else{
        $total_price += 4.99;
        $contenidoPrincipal .= <<<EOS
    <li>
        <p class="strong">Gastos de envío: 4.99 €</p>
        <br>
        <p>*Gratis para compras igual o superiores a 30€</p>
    </li>
EOS;
    }
}

$total_price = $total_price - $descuentoPremium;

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
            <button type="submit" name="pay" id="validar_compra" onclick="aceptarCompra()">Pagar</button>
        </form>
    </div>
</div>
EOS;

if (isset($_POST['pay'])) {
    $descuentoPorProd=1;
    if ($_SESSION['rol'] == 'P') {
        $descuentoPorProd=0.9;
    }
    $idUsuario = $_SESSION['id'];
    if(isset($_SESSION['cupon_descuento'])){
        $descuento = $_SESSION['cupon_descuento'];
    }else{
        $descuento = 0;
    }
    // Vaciar el carrito de compras
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            foreach ($product as $size => $item) {
                if (is_array($item)) {
                    $total = round($item['price'] * $item['cantidad'] * $descuentoPorProd, 2);
                    $compra = es\ucm\fdi\aw\Compra::crea($idUsuario, $item['id'], strtolower($item['size']), $item['cantidad'], $total, $descuento);
                }
            }
        }
        unset($_SESSION['cart']);
        unset($_SESSION['cupon_descuento']);
    }
    header('Location: index.php');
    exit;
}

// Generar la plantilla
require __DIR__.'/includes/plantillas/plantilla.php';