<?php
require_once __DIR__.'/includes/configuracion.php';

if (isset($_POST['remove'])) {
    $product_data = explode('|', $_POST['remove']);
    $product_id = $product_data[0];
    if (isset($_SESSION['wishlist'][$product_id])) {
        unset($_SESSION['wishlist'][$product_id]);
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
        if (is_array($producto)) {
            $src = 'img/producto_' . $producto['id'] . '.png';
            $alt = 'Imagen de Producto ' . $producto['id'];
            $nombre = $producto['name'];
            $precio = $producto['price'];
            $contenidoPrincipal .= <<<EOS
                <li>
                    
                    <img class="imgProducto" src='$src' alt='$alt'>
                    <br>
                    $nombre - $precio €
                    <form method="post">
                        <button type="submit" name="remove" value="$id">Eliminar</button>
                    </form>
                    
                </li>
            EOS;
        }
    }
} else {
    $contenidoPrincipal .= '<p>No hay productos en la lista de deseos</p>';
}

require __DIR__.'/includes/plantillas/plantilla.php';
?>