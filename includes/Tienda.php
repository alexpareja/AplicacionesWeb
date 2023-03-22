<?php 
namespace es\ucm\fdi\aw;

class Tienda {

    private $productos;

    public function __construct() {
        $this->productos = Producto::getTienda();
    }

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

            $html .= <<<EOS
					<li>
						<a href='$link'>
						<img class='imgProducto' src='$src' alt='$alt'>
						<br>
						$nombre
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

    // otros métodos de la clase

}
