<?php

namespace es\ucm\fdi\aw;

class FormularioAnadirCarrito extends Formulario
{

    private $producto;

    public function __construct() {
        if (isset($_POST["accion"]) && $_POST["accion"] == "add") {
            $url = "carrito.php";
        } else {
            $url = "listadeseos.php";
        }
        parent::__construct('formCarrito', ['urlRedireccion' => $url]);
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
        $erroresCampos = self::generaErroresCampos(['cantidad', 'noStock', 'noSesion','enLista','talla'], $this->errores, 'span', array('class' => 'error'));

		$html =<<<EOF
        $htmlErroresGlobales
        <div class="product-form">
        <input type="hidden" name="id" value="{$this->producto->getId()}">
        <input type="hidden" name="name" value="{$this->producto->getNombre()}">
        <input type="hidden" name="price" value="{$this->producto->getPrecio()}">
        <input type="hidden" name="oferta" value="{$this->producto->getOferta()}">
        <div class="tallas">
            <label class="talla" for="xs">
            <input type="radio" id="xs" name="size" value="xs">
             <span> XS </span>
            </label>
            <label class="talla" for="s">
            <input type="radio" id="s" name="size" value="s">
            <span> S </span>
            </label>
            <label class="talla" for="m">
            <input type="radio" id="m" name="size" value="m">
            <span> M </span>
            </label>
            <label class="talla" for="l">
            <input type="radio" id="l" name="size" value="l">
            <span> L </span>
            </label>
            <label class="talla" for="xl">
            <input type="radio" id="xl" name="size" value="xl">
            <span> XL </span>
            </label>
        </div>
        <div class="stockTallas">
            <h3>Stock:</h3>
            <p>XS: {$this->producto->getStockXS()}</p>
            <p>S: {$this->producto->getStockS()}</p>
            <p>M: {$this->producto->getStockM()}</p>
            <p>L: {$this->producto->getStockL()}</p>
            <p>XL: {$this->producto->getStockXL()}</p>
        </div>
        <div class="anadir-carrito">
        <h3>Cantidad:</h3>
        <input type="number" id="quantity" class="quantity" name="quantity" value="1" min="0"> <!-- Con javascript solo se podrá seleccionar como máximo el stock que tenga cada talla-->
        <button type="submit" name="accion" id="boton" value="add">Añadir al carrito</button>
        </div>
        <button type="submit" name="accion" value="favorite">Añadir a favoritos</button>
        </div>
        <span class="error">{$erroresCampos['noStock']}</span>
        <span class="error">{$erroresCampos['talla']}</span>
        <span class="error">{$erroresCampos['cantidad']}</span>
        <span class="error">{$erroresCampos['noSesion']}</span>
        <span class="error">{$erroresCampos['enLista']}</span>
        EOF;
		return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];
        $cantidad = $datos['quantity'] ?? '';
        $talla = $datos['size'] ?? '';
        if (isset($_POST["accion"]) && $_POST["accion"] == "add") {
            if ( ! $cantidad || empty($cantidad)) {
                $this->errores['cantidad'] = 'Se debe especificar el número de productos a comprar.';
            }
            if($talla=='')
            {
                $this->errores['talla'] = "Se debe especificar la talla del producto.";
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
				$oferta = $datos['oferta']; 
				if($oferta>0){
					$price = round($price * (100- $oferta) /100,2);
				}
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
        } elseif(isset($_POST["accion"]) && $_POST["accion"] == "favorite") {
            if (isset($datos['id'])) {
                $id = $datos['id'];
                $name = $datos['name'];
                $price = $datos['price'];
				$oferta = $datos['oferta']; 
				if($oferta>0){
					$price = round($price * (100- $oferta) /100,2);
				}

                // Comprueba si el producto no está en la lista de deseos y tiene sesión iniciada
                if(isset($_SESSION['login'])) {
                    $idUsuario = $_SESSION['id'];
                    $existe=Favoritos::buscaPorUsuarioYProducto($idUsuario, $id);
                     if (!$existe) {
                        $favs = Favoritos::crea($idUsuario, $id);
                    } else {
                        $this->errores['enLista'] = "Este producto ya está en favoritos";
                    }
                } else {
                    $this->errores['noSesion'] = "No se puede añadir a favoritos sin iniciar sesión";
                }
            }
        }
    }
}
?>