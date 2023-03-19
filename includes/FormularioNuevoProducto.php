<?php
require_once __DIR__.'/Formulario.php';
require_once __DIR__.'/Producto.php';


class FormularioNuevoProducto extends Formulario
{
    public function __construct() {
        parent::__construct('formNuevoProd', array('urlRedireccion' => 'tienda.php', 'enctype' => 'multipart/form-data'));
    }
    
    protected function generaCamposFormulario(&$datos)
    {
		$htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);

        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
		$html=<<<EOF
		$htmlErroresGlobales
		<div id="newP-form">
			<fieldset>
				<legend>Nuevo Producto</legend>
				<div>
					<p><label for="nombre">Nombre:</label></p>
					<p><input id="nombre" type="text" name="nombre" /></p>
				</div>
				<div>
					<p><label for="descripcion">Descripción:</label></p>
					<p><textarea id="descripcion" name="descripcion"></textarea></p>
				</div>
				<div>
					<p><label for="precio">Precio:</label></p>
					<p><input id="precio" type="number" step="0.01" min="0" name="precio"/></p>
				</div>
				<div>
					<p><label for="imagen">Imagen:</label></p>
					<p><input id="imagen" type="file" name="imagen"/></p>
				</div>
				<div>
					<p><label>Tallas en Stock:</label></p>
					<ul class="botones">
						<li>
							<label for="tallas">XS:</label>
							<input id="tallas" type="number" min="0" max="500" name="XS"/>
						</li>
						<li>
							<label for="tallas">S:</label>
							<input id="tallas" type="number" min="0" max="500" name="S"/>
						</li>
						<li>
							<label for="tallas">M:</label>
							<input id="tallas" type="number" min="0" max="500" name="M"/>
						</li>
						<li>
							<label for="tallas">L:</label>
							<input id="tallas" type="number" min="0" max="500" name="L"/>
						</li>
						<li>
							<label for="tallas">XL:</label>
							<input id="tallas" type="number" min="0" max="500" name="XL"/>
						</li>
					<ul>
				</div>
				<div>
					<ul class= "botones">
						<li><button type="submit">Añadir Producto</button></li>
						<li><button type="submit">Volver a la tienda</button></li>
					<ul>
				</div>
			</fieldset>
		</div>
	EOF;
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
       /* $this->errores = [];
        $emailUsuario = trim($datos['emailUsuario'] ?? '');
        $emailUsuario = filter_var($emailUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $emailUsuario || empty($emailUsuario) ) {
            $this->errores['emailUsuario'] = 'El email no puede estar vacío';
        }
        
        $password = trim($datos['password'] ?? '');
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password || empty($password) ) {
            $this->errores['password'] = 'La contraseña no puede estar vacía.';
        }
        
		*/
		
        if (count($this->errores) === 0) {
			$nombre= htmlspecialchars(strip_tags($datos['nombre']));
			$descripcion= htmlspecialchars(strip_tags($datos['descripcion']));
			$precio= $datos['precio'];
			$xs= $datos['XS'];
			$s= $datos['S'];
			$m= $datos['M'];
			$l= $datos['L'];
			$xl= $datos['XL'];
			$imagen = $_FILES['imagen'];
			$tipoArchivo = $imagen['type'];
			$rutaArchivo = $imagen['tmp_name'];
			
			if($tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/png') {
								$producto = Producto::crea($nombre, $descripcion, $precio, $xs, $s, $m, $l, $xl);
	
				$nombreImagen = 'producto_'.$producto->getID().'.png'; // Nombre de la imagen que se guardará
				$ruta = 'img/'.$nombreImagen; // Ruta donde se guardará la imagen

				move_uploaded_file($rutaArchivo, $ruta);
			} else {
				$this->errores[] = 'La imagen no es valida';		
				}	
        }
    }
}