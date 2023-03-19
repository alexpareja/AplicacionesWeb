<?php
require_once __DIR__.'/Formulario.php';
require_once __DIR__.'/Producto.php';

class FormularioAnadirCarrito extends Formulario
{

    private $producto;

    public function __construct() {
        parent::__construct('formRegistro', ['urlRedireccion' => 'carrito.php']);
    }
    
    public function setProducto($producto) {
        $this->producto=$producto;
    }

    protected function generaCamposFormulario(&$datos)
    {
        $id = $datos['id'] ?? '';
        $talla = $datos['talla'] ?? '';
        $cantidad = $datos['cantidad'] ?? '';
        $precio = $datos['precio'] ?? '';
        

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['cantidad', 'noStock'], $this->errores, 'span', array('class' => 'error'));

        $html = <<<EOF
        $htmlErroresGlobales
        <form action="carrito.php" method="post">
        <input type="hidden" name="id" value="{$this->producto->getNombre()}">
        <label for="talla">Talla:</label>
        <select id="talla" name="size"> 
        <option value="xs">XS</option>
        <option value="s">S</option>
        <option value="m">M</option>
        <option value="l">L</option>
        <option value="xl">XL</option>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="1" min="1"> <!-- Con javascript solo se podrá seleccionar como máximo el stock que tenga cada talla-->
        <label for="precio">Precio:</label>        
        <input type="text" id="precio" name="precio" value="{$this->producto->getPrecio()}" readonly>
        <button type="submit">Agregar al carrito</button>
        <img class='corazon' src="img/corazon.png" alt="Añadir a favoritos">
        </form>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];
        $cantidad = $datos['cantidad'] ?? '';
        $talla = $datos['talla'] ?? '';
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
    }
}
?>