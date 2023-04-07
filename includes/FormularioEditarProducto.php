<?php
namespace es\ucm\fdi\aw;


class FormularioEditarProducto extends Formulario
{
	 private $producto;

    public function __construct() {
        parent::__construct('formEditarProd', array('urlRedireccion' => 'tienda.php', 'enctype' => 'multipart/form-data'));
    }
	
	 public function setProducto($producto) {
        $this->producto=$producto;
    }
    
    protected function generaCamposFormulario(&$datos)
    {
		$nombre = $datos['nombre'] ?? '';
		
		$htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
		$erroresCampos = self::generaErroresCampos(['nombre', 'precio', 'imagen'], $this->errores, 'span', array('class' => 'error'));

		

        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
		$html=<<<EOF
		$htmlErroresGlobales
		<div id="product-form">
			<fieldset>
				<legend>Editar Producto</legend>
				<input type="hidden" name="id" value="{$this->producto->getId()}">
				<div>
					<p><label for="nombre">Nombre:</label></p>
					<p><input id="nombre" type="text" name="nombre" value="{$this->producto->getNombre()}"></p>
					{$erroresCampos['nombre']}
				</div>
				<div>
			  
					<p><label for="descripcion">Descripción:</label></p>
					 <p><textarea id="descripcion" name="descripcion">{$this->producto->getDescripcion()}</textarea></p>
				</div>
				<div>
					<p><label for="precio">Precio:</label></p>
					<p><input id="precio" type="number" step="0.01" min="0" name="precio" value="{$this->producto->getPrecio()}"></p>
					{$erroresCampos['precio']}
				</div>
				<div>
					<p><label for="imagen">Imagen:</label></p>
					<p><input id="imagen" type="file" name="imagen"></p>
					{$erroresCampos['imagen']}
				</div>
				<div>
					<p><label>Tallas en Stock:</label></p>
					<ul class="botones">
						<li>
							<label for="tallaXS">XS:</label>
							<input id="tallaXS" type="number" min="0" max="500" name="XS" value="{$this->producto->getStockXS()}">
						</li>
						<li>
							<label for="tallaS">S:</label>
							<input id="tallaS" type="number" min="0" max="500" name="S" value="{$this->producto->getStockS()}">
						</li>
						<li>
							<label for="tallaM">M:</label>
							<input id="tallaM" type="number" min="0" max="500" name="M" value="{$this->producto->getStockM()}">
						</li>
						<li>
							<label for="tallaL">L:</label>
							<input id="tallaL" type="number" min="0" max="500" name="L" value="{$this->producto->getStockL()}">
						</li>
						<li>
							<label for="tallaXL">XL:</label>
							<input id="tallaXL" type="number" min="0" max="500" name="XL" value="{$this->producto->getStockXL()}">
						</li>
					</ul>
				</div>
				<div>
					<ul class= "botones">
						<li><button type="submit">Editar Producto</button>
						</li>
						<li>
						<button type="submit">Eliminar producto</button>
						</li>
						<li>
						<button type="submit" formaction="tienda.php">Volver a la tienda</button>
						</li>
						
					</ul>
				</div>
			</fieldset>
		</div>
	EOF;
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
		
        $this->errores = [];
		
		$nombre = trim($datos['nombre'] ??   '' );
        $nombre = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);	
			
		
		$descripcion = trim($datos['descripcion'] ?? '');
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
		$precio= $datos['precio'];
		$id = $datos['id'];
		$xs= $datos['XS'];
		$s= $datos['S'];
		$m= $datos['M'];
		$l= $datos['L'];
		$xl= $datos['XL'];
		
		$imagen = $_FILES['imagen'];
		
		if ( ! $nombre || empty($nombre)) {
            $this->errores['nombre'] = 'Se debe especificar el nombre del producto que se quiere introducir.';
        }
		if ( ! $precio || empty($precio)) {
            $this->errores['precio'] = 'Se debe especificar el precio del producto que se quiere introducir.';
        }
		
        if (count($this->errores) === 0) {
			$tipoArchivo = $imagen['type'];
			$rutaArchivo = $imagen['tmp_name'];
			
			if($tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/png') {
				$producto = Producto::crea($id, $nombre, $descripcion, $precio, $xs, $s, $m, $l, $xl);
	
				$nombreImagen = 'producto_'.$id.'.png'; // Nombre de la imagen que se guardará
				$ruta = 'img/'.$nombreImagen; // Ruta donde se guardará la imagen

				move_uploaded_file($rutaArchivo, $ruta);
			} else {
				$this->errores['imagen'] = 'El archivo introducido no es valido';		
				}	
        }
    }
}