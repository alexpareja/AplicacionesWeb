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
					<div id="productos">
					<ul class="lista-productos" id="lista-productos">
				EOS;
		foreach($this->productos as $prod){
			if($prod->getPremium() == 0) {
				$link = 'mostrarProducto.php?id='.$prod->getId();
				$src = 'img/producto_'.$prod->getId().'.png';
				$alt = 'Imagen de Producto '.$prod->getId();
				$nombre = $prod->getNombre();
				$oferta = $prod->getOferta();
				$precio = $prod->getPrecio();
				if($oferta>0){
					$precio=$precio * (100- $oferta) /100;
				}
				$tallas = $prod->getTallasDisponibles();
				if($tallas !== '' || isset($_SESSION['admin']) && $_SESSION['admin']){
					$html .= <<<EOS
						<li class="producto" data-precio='$precio' data-talla='$tallas' data-nombre='$nombre'>
							<a href='$link'>
							<div class="producto-imagen">
							<img class='imgProducto
				EOS;
					if($tallas == ''){
						$html .= <<<EOS
							img-sin-stock
						EOS;
					}
					$html .= <<<EOS
						' src='$src' alt='$alt'>
							</div>
							<br>
							$nombre <span class='precio'> $precio € </span>						
				EOS;
					if($tallas == ''){
						$html .= <<<EOS
						<span class = "sin-stock"> sin stock </span>
						EOS;
					}
					$html .= <<<EOS
							</a>
						</li>
					EOS;
				}
			}
		}
		$html .= <<<EOS
					</ul>        
					</div>
				EOS;
		return $html;
	}


    public function productosEnTiendaPremium() {
		$html = '';
		$html .= <<<EOS
					<div id="productos-premium">
					<ul class="lista-productos-premium" id="lista-productos-premium">
				EOS;
		foreach($this->productos as $prod){
			if($prod->getPremium() == 1) {
				$link = 'mostrarProducto.php?id='.$prod->getId();
				$src = 'img/producto_'.$prod->getId().'.png';
				$alt = 'Imagen de Producto '.$prod->getId();
				$nombre = $prod->getNombre();
				$oferta = $prod->getOferta();
				$precio = $prod->getPrecio();
				if($oferta>0){
					$precio=$precio * (100- $oferta) /100;
				}
				$tallas = $prod->getTallasDisponibles();
				if($tallas !== '' || isset($_SESSION['admin']) && $_SESSION['admin']){
					$html .= <<<EOS
						<li class="producto-premium" data-precio='$precio' data-talla='$tallas' data-nombre='$nombre'>
							<a href='$link'>
							<div class="producto-imagen">
							<img class='imgProducto
				EOS;
					if($tallas == ''){
						$html .= <<<EOS
							img-sin-stock
						EOS;
					}
					$html .= <<<EOS
						' src='$src' alt='$alt'>
							</div>
							<br>
							$nombre <span class='precio'> $precio € </span>						
				EOS;
					if($tallas == ''){
						$html .= <<<EOS
						<span class = "sin-stock"> sin stock </span>
						EOS;
					}
					$html .= <<<EOS
							</a>
						</li>
					EOS;
				}
			}
		}
		$html .= <<<EOS
					</ul>        
					</div>
				EOS;
		return $html;
	}

    public function productosAleatoriosEnTienda() {
    $html = '';
    $html .= <<<EOS
        <div class="productos-premium">
        <ul class="lista-productos-premium" id="lista-productos">
    EOS;
    
    // Obtener una lista aleatoria de tres productos
    $productos_aleatorios = array_rand($this->productos, 3);
    
    foreach($productos_aleatorios as $key => $value) {
        $prod = $this->productos[$value];
        $link = 'mostrarProducto.php?id='.$prod->getId();
        $src = 'img/producto_'.$prod->getId().'.png';
        $alt = 'Imagen de Producto '.$prod->getId();
        $nombre = $prod->getNombre();
        $precio = $prod->getPrecio();
        $tallas = $prod->getTallasDisponibles();
        if($tallas !== '' || isset($_SESSION['admin']) && $_SESSION['admin']){
            $html .= <<<EOS
                <li class="producto" data-precio='$precio' data-talla='$tallas' data-nombre='$nombre'>
                    <a href='$link'>
                    <div class="producto-imagen">
                    <img class='imgProducto' src='$src' alt='$alt'>
                    </div>
                    <br>
                    <div class="info-prod">
                    $nombre <span class='precio'> $precio € </span>
                    </div>
                    </a>
                </li>                 
        EOS;
        }    
    }
    
    $html .= <<<EOS
            </ul>        
            </div>
    EOS;
    return $html;
    }

}
