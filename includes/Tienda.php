<?php 
namespace es\ucm\fdi\aw;

class Tienda {

    private $productos;

    public function __construct() {
        $this->productos = Producto::getTienda();
    }
	//Muestra la imagen, nombre y precio de los productos de la base de datos
    public function productosEnTienda() {
		$html = '';
		$html .= <<<EOS
				<h2 class="titulo1">Productos</h2>
				<h2 class="titulo2">de La Quinta Caja</h2>

					<div id="productos">
					<ul class="lista-productos" id="lista-productos">
				EOS;
        foreach($this->productos as $prod){
            $link = 'mostrarProducto.php?id='.$prod->getId();
            $src = 'img/producto_'.$prod->getId().'.png';
            $alt = 'Imagen de Producto '.$prod->getId();
            $nombre = $prod->getNombre();
            $precio = $prod->getPrecio();
			$tallas = $prod->getTallasDisponibles();
            $html .= <<<EOS
					<li class="producto" data-precio='$precio' data-talla='$tallas' nombre='$nombre'>
						<a href='$link'>
						<div class="producto-imagen">
						<img class='imgProducto' id='imgProducto' src='$src' alt='$alt'>
						</div>
						<br>
						$nombre <span class='precio'> $precio € </span>
						</a>
					</li>
				EOS;
        }
			$html .= <<<EOS
						</ul>        
						</div>
				EOS;
        return $html;
    }
}
