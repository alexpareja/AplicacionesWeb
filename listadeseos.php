<?php
require_once __DIR__.'/includes/configuracion.php';

if (isset($_POST['remove'])) {
    $product_data = explode('|', $_POST['remove']);
    $product_id = $product_data[0];
    $product_size = $product_data[1];
    if (isset($_SESSION['wishlist'][$product_id][$product_size])) {
        unset($_SESSION['wishlist'][$product_id][$product_size]);
    }
}

$tituloPagina = 'Lista de deseos';
$contenidoPrincipal = '';

$contenidoPrincipal .= <<<EOS
<div id="tienda">
EOS;

$contenidoPrincipal .= <<<EOS
<h2>Mi Lista de deseos</h2>
<div id="productos">
    <ul class="productos">
EOS;

if (isset($_SESSION['wishlist'])) {
    foreach ($_SESSION['wishlist'] as $id => &$producto) {
        foreach ($producto as $size => &$item) {
            if (is_array($item)) {
                $src = 'img/producto_' . $item['id'] . '.png';
                $alt = 'Imagen de Producto ' . $item['id'];
                $nombre = $item['name'];
                $precio = $item['price'];
                $talla = $item['size'];
                $contenidoPrincipal .= <<<EOS
                    <li>
                        
                        <img class="imgProducto" src='$src' alt='$alt'>
                        <br>
                        $nombre - Talla: $talla - $precio €
                        <form method="post">
                            <button type="submit" name="remove" value="$id|$size">Eliminar</button>
                        </form>
                        
                    </li>
                EOS;
            }
        }
    }
} else {
    $contenidoPrincipal .= '<p>No hay productos en la lista de deseos</p>';
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>