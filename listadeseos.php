<?php
use es\ucm\fdi\aw\Favoritos;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Favoritos.php';

if (isset($_POST["remove"])) {
    $product_id = $_POST["remove"];
    $usuario_id = $_SESSION['id'];
    $favoritos = Favoritos::borra($usuario_id, $product_id);
    $contenidoPrincipal .="<p>holaaaaaaaaaa</p>";
}

$tituloPagina = 'Lista de deseos';
$contenidoPrincipal = '';

$contenidoPrincipal .= <<<EOS
<div id="tienda">
EOS;

$contenidoPrincipal .= <<<EOS
<h2>Mi Lista de deseos</h2>
<div id="productos">
    <ul class="lista-productos">
EOS;
$favs= Favoritos::getFavoritos($_SESSION['id']);
if ($favs) {
    foreach ($favs as $fav) {
            $prod= es\ucm\fdi\aw\Producto::buscaPorId($fav->getProducto());
            $link = 'mostrarProducto.php?id='.$fav->getProducto();
            $src = 'img/producto_' . $fav->getProducto(). '.png';
            $alt = 'Imagen de Producto ' . $fav->getProducto();
            $nombre = $prod->getNombre();
            $precio = $prod->getPrecio();
            $idProd=$prod->getId();
            $contenidoPrincipal .= <<<EOS
                <li>
                    <div class="producto-imagen">
                    <img class='imgProducto' id='imgProducto' src='$src' alt='$alt'>
                    </div>
                    <br>
                    $nombre <span class='precio'> $precio € </span>
                    <div class="comprar-eliminar-producto">
                    <form method="post">
                        <button type="submit" name="remove" value="$idProd">Eliminar</button>
                    </form> 
                    <form method="post" action='$link'>
                        <button type="submit" name="comprar">Comprar</button>
                    </form> 
                    </div>
                </li>
            EOS;
        
    }
} else {
    $contenidoPrincipal .= <<<EOS
    <div class="no-prod">
    <p>No hay productos en la lista de deseos</p>
    </div>
    EOS;
}

require __DIR__.'/includes/plantillas/plantillaCarrito.php';
?>