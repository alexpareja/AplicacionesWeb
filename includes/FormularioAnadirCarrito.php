<?php
require_once __DIR__.'/Formulario.php';
require_once __DIR__.'/Producto.php';

class FormularioAnadirCarrito extends Formulario
{

    private $producto;

    public function __construct() {
        parent::__construct('formCarrito', ['urlRedireccion' => 'carrito.php']);
    }
    
    public function setProducto($producto) {
        $this->producto=$producto;
    }

    protected function generaCamposFormulario(&$datos)
    {
        $id = $datos['id'] ?? '';
        $talla = $datos['talla'] ?? '';
        $cantidad = $datos['quantity'] ?? '';
        $precio = $datos['precio'] ?? '';
        

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['cantidad', 'noStock'], $this->errores, 'span', array('class' => 'error'));

		$html =<<<EOF
        $htmlErroresGlobales
        <div id="product-form">
        <input type="hidden" name="id" value="{$this->producto->getId()}">
        <input type="hidden" name="name" value="{$this->producto->getNombre()}">
        <label for="talla">Talla:</label>
        <select id="talla" name="size"> 
        <option value="xs">XS</option>
        <option value="s">S</option>
        <option value="m">M</option>
        <option value="l">L</option>
        <option value="xl">XL</option>
        </select>
        <label for="quantity">Cantidad:</label>
        <input type="number" id="quantity" name="quantity" value="0" min="1"> <!-- Con javascript solo se podrá seleccionar como máximo el stock que tenga cada talla-->
        <label for="precio">Precio:</label>        
        <input type="text" id="precio" name="price" value="{$this->producto->getPrecio()}" readonly>
        <button type="submit">Agregar al carrito</button>
        <img class='corazon' src="img/corazon.png" alt="Añadir a favoritos">
        </div>
        <span>Stocks por talla:</span>
        <span id="stockTallas">XS: {$this->producto->getStockXS()}, S: {$this->producto->getStockS()},
        M: {$this->producto->getStockM()}, L: {$this->producto->getStockL()}, XL: {$this->producto->getStockXL()} <br></span>
        <span id="errorNoStock">{$erroresCampos['noStock']}</span>
        <span id="errorNoCantidad">{$erroresCampos['cantidad']}</span>
        EOF;
		return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];
        $cantidad = $datos['quantity'] ?? '';
        $talla = $datos['size'] ?? '';
        if ( ! $cantidad || empty($cantidad)) {
            $this->errores['cantidad'] = 'Se debe especificar el número de productos a comprar.';
        }
        if($talla=='xs'and $cantidad>$this->producto->getStockXS())
        {
            $this->errores['noStock'] = "No hay suficiente stock en la talla seleccionada. El máximo es ".$this->producto->getStockXS();
        }
        if($talla=='s'and $cantidad>$this->producto->getStockS())
        {
            $this->errores['noStock'] = "No hay suficiente stock en la talla seleccionada. El máximo es ".$this->producto->getStockS();
        }
        if($talla=='m'and $cantidad>$this->producto->getStockM())
        {
            $this->errores['noStock'] = "No hay suficiente stock en la talla seleccionada. El máximo es ".$this->producto->getStockM();
        }
        if($talla=='l'and $cantidad>$this->producto->getStockL())
        {
            $this->errores['noStock'] = "No hay suficiente stock en la talla seleccionada. El máximo es ".$this->producto->getStockL();
        }
        if($talla=='xl'and $cantidad>$this->producto->getStockXL())
        {
            $this->errores['noStock'] = "No hay suficiente stock en la talla seleccionada. El máximo es ".$this->producto->getStockXL();
        }
        if (count($this->errores) === 0) {
		if (isset($datos['id'])) {
			$id = $datos['id'];
			$name = $datos['name'];
			$quantity = $datos['quantity'];
			$price = $datos['price'];
			$size = $datos['size'];
			$cogerStockTalla= "getStock$size";
	// Si el producto ya está en el carrito, se suma la cantidad nueva a la cantidad que ya tiene el producto
			if(isset($_SESSION['cart'][$id][$size])) {
				if(($_SESSION['cart'][$datos['id']][$datos['size']]['cantidad'] + $quantity) <= $this->producto->$cogerStockTalla()){
				$_SESSION['cart'][$id][$size]['cantidad'] += $quantity;
				}
				else{
		       $this->errores['noStock'] = "No hay suficiente stock en la talla seleccionada. El máximo es ".$this->producto->$cogerStockTalla();
				}
			} else {
			$_SESSION['cart'][$id][$size] = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'cantidad' => $quantity,
			'size' => $size,
        );
	    }
        }
        }
    }
}
?>