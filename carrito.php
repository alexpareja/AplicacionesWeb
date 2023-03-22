<?php
require_once __DIR__.'/includes/configuracion.php';


// Eliminar una cantidad de un producto del carrito de compras
if (isset($_POST['remove_quantity'])) {
    $product_data = explode('|', $_POST['remove_quantity']);
    $product_id = $product_data[0];
    $product_size = $product_data[1];
    $quantity_to_remove = (int) $_POST['quantity_to_remove'];
    if (isset($_SESSION['cart'][$product_id][$product_size])) {
        $product = $_SESSION['cart'][$product_id][$product_size];
        if ($quantity_to_remove >= $product['cantidad']) {
            // Eliminar el producto completo si la cantidad a eliminar es mayor o igual a la cantidad del producto
            unset($_SESSION['cart'][$product_id][$product_size]);
        } else {
            // Actualizar la cantidad del producto si la cantidad a eliminar es menor que la cantidad del producto
            $_SESSION['cart'][$product_id][$product_size]['cantidad'] -= $quantity_to_remove;
        }
    }
}

// Calcular el precio total del carrito de compras
$total_price = 0;
$cart_products = array();
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        foreach ($product as $size => $item) {
            if (is_array($item)) {
                $total_price += $item['price'] * $item['cantidad'];
                $cart_products[] = $item;
            }
        }
    }
}

// Generar el contenido de la página
$tituloPagina = 'Carrito';
$contenidoPrincipal = '';
$contenidoPrincipal .= <<<EOS
<div id="tienda">
EOS;

$contenidoPrincipal .= <<<EOS
<h2>Mi carrito</h2>
<div id="productos">
    <ul class="productos">
EOS;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => &$producto) {
        foreach ($producto as $size => &$item) {
            if (is_array($item)) {
                $src = 'img/producto_' . $item['id'] . '.png';
                $alt = 'Imagen de Producto ' . $item['id'];
                $nombre = $item['name'];
                $precio = $item['price'];
                $cantidad = $item['cantidad'];
                $talla = $item['size'];
                $contenidoPrincipal .= <<<EOS
                    <li>
                        <a>
                        <img class="imgProducto" src=$src alt=$alt />
                        </br>
                        $nombre - Talla: $talla - $precio € - Cantidad: $cantidad
                        <form method="post">
                            <input type="number" name="quantity_to_remove" value = "0" min = "0" max="$cantidad">
                            <button type="submit" name="remove_quantity" value="$id|$size">Eliminar</button>
                        </form>
                        </a>
                    </li>
                EOS;
            }
        }
    }
} else {
    $contenidoPrincipal .= '<p>No hay productos en el carrito</p>';
}

$contenidoPrincipal .= <<<EOS
    </ul>
    <div class="seguir-comprando">
        <form action="tienda.php" method="get">
            <button type="submit">Seguir comprando</button>
        </form>
    </div>
    <form method="get">
        <input type="hidden" name="checkout">
        <button type="submit">Ir a pagar</button>
        <span class="total-price">Total: $total_price €</span>
    </form>
</div>
EOS;

// Si se hace clic en el botón "Ir a pagar", redirigir a la página de pago
if (isset($_GET['checkout'])) {
    if (empty($_SESSION['cart'])) {
        $contenidoPrincipal .= '<p>¡No hay nada que comprar!</p>';
    } else {
        header('Location: pago.php');
        exit;
    }
}

// Generar la plantilla
require __DIR__.'/includes/plantillas/plantillaCarrito.php';
