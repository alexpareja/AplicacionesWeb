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
				<h2>Productos</h2>
					<div id="productos">
					<ul class = "productos">
				EOS;
        foreach($this->productos as $prod){
            $link = 'mostrarProducto.php?id='.$prod->getId();
            $src = 'img/producto_'.$prod->getId().'.png';
            $alt = 'Imagen de Producto '.$prod->getId();
            $nombre = $prod->getNombre();
            $precio = $prod->getPrecio();

            $html .= <<<EOS
					<li>
						<a href='$link'>
						<img class='imgProducto' src='$src' alt='$alt'>
						<br>
						$nombre  $precio €
						</a>
					</li>
				EOS;
        }
			$html .= <<<EOS
						</ul>        
						</div>
					</div>
				EOS;
        return $html;
    }
}
