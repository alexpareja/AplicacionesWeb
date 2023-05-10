<?php
use es\ucm\fdi\aw\Favoritos;
require_once __DIR__.'/includes/configuracion.php';
require_once __DIR__.'/includes/Favoritos.php';

if (isset($_POST["remove"])) {
    $product_id = $_POST["remove"];
    $usuario_id = $_SESSION['id'];
    $favoritos = Favoritos::borra($usuario_id, $product_id);
}

$tituloPagina = 'Lista de deseos';
$contenidoPrincipal = '';

$contenidoPrincipal .= <<<EOS
<div class="tienda">
EOS;

$contenidoPrincipal .= <<<EOS
<h2>Mi Lista de deseos</h2>
<div class="productos">
EOS;
$favs= Favoritos::getFavoritos($_SESSION['id']);
if ($favs) {
	$contenidoPrincipal .= <<<EOS
    <ul class="lista-productos">
EOS;

    foreach ($favs as $fav) {
            $prod= es\ucm\fdi\aw\Producto::buscaPorId($fav->getProducto());
            $link = 'mostrarProducto.php?id='.$fav->getProducto();
            $src = 'img/producto_' . $fav->getProducto(). '.png';
            $alt = 'Imagen de Producto ' . $fav->getProducto();
            $nombre = $prod->getNombre();
            $precio = $prod->getPrecio();
			$oferta = $prod->getOferta(); 
				if($oferta>0){
					$precio = round($precio * (100- $oferta) /100,2);
				}
            $idProd=$prod->getId();
            $contenidoPrincipal .= <<<EOS
                <li>
                    <div class="producto-imagen">
                    <img class='imgProducto' id='imgProducto' src='$src' alt='$alt'>
                    </div>
                    <br>
EOS;
if($oferta>0){
$contenidoPrincipal .= <<<EOS
                    $nombre <span class='precioOferta'> $precio € </span>
EOS;
} else{
$contenidoPrincipal .= <<<EOS
$nombre <span class='precio'> $precio € </span>
EOS;
}
$contenidoPrincipal .= <<<EOS
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
	$contenidoPrincipal .= <<<EOS
        </ul>
    EOS;

} else {
    $contenidoPrincipal .= <<<EOS
    <div class="no-prod">
    <p>No hay productos en la lista de deseos</p>
    </div>
    EOS;
}

$contenidoPrincipal .= <<<EOS
</div>
</div>
EOS;

require __DIR__.'/includes/plantillas/plantillaCarrito.php';
?>
