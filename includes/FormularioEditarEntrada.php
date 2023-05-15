<?php
namespace es\ucm\fdi\aw;
class FormularioEditarEntrada extends Formulario
{
	 private $entrada;

	public function __construct() {
		parent::__construct('formEditarEntr', array('urlRedireccion' => 'blog.php', 'enctype' => 'multipart/form-data'));
	}
	
	 public function setEntrada($entrada) {
		$this->entrada=$entrada;
	}
	
	protected function generaCamposFormulario(&$datos)
	{
		$titulo = $datos['titulo'] ?? '';
		
		$htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
		$erroresCampos = self::generaErroresCampos(['titulo', 'contenido','descripcion','imagen'], $this->errores, 'span', array('class' => 'error'));

		if($this->entrada->getCategoria()==="sostenibilidad") {
			$sostenibilidad = 'checked';
			$moda = '';
			$actualidad = '';
		} else if ($this->entrada->getCategoria()==="actualidad"){
			$sostenibilidad = '';
			$moda = '';
			$actualidad = 'checked';
		}
		else{
			$sostenibilidad = '';
			$moda = 'checked';
			$actualidad = '';
		}

		// Se genera el HTML asociado a los campos del formulario y los mensajes de error.
		$html=<<<EOF
		$htmlErroresGlobales
		<div class="product-form">
			<fieldset>
				<legend>Editar Entrada</legend>
				<input type="hidden" name="id" value="{$this->entrada->getId()}">
				<div>
				<p><label for="titulo">Titulo:</label></p>
				<p><input id="titulo" type="text" name="titulo" value="{$this->entrada->getTitulo()}"></p>
				{$erroresCampos['titulo']}
				</div>
				<div>
				<p><label for="descripcion">Descripción:</label></p>
				<p><textarea id="descripcion" name="descripcion">{$this->entrada->getDescripcion()}</textarea></p>
				{$erroresCampos['descripcion']}
				</div>
				<div>
				<p><label for="contenido">Contenido:</label></p>
				<p><textarea id="contenido" name="contenido" class="contenido">{$this->entrada->getContenido()}</textarea></p>
				{$erroresCampos['contenido']}
				</div>
				<div>
					<p>
						<label class="categoria">Categoría:</label>
						<input type="radio" id="sostenibilidad" name="categoria" value="sostenibilidad" $sostenibilidad>
						<label for="sostenibilidad" class="dede">Sostenibilidad</label>
						<input type="radio" id="moda" name="categoria" value="moda" $moda>
						<label for="moda" class="dede">Moda</label>
						<input type="radio" id="actualidad" name="categoria" value="actualidad" $actualidad>
						<label for="actualidad" class="dede">Actualidad</label>
					</p>
				</div>
				<div>
					<label>Imagen:</label>
					<div id='subir-archivo1' class='subir-archivo1'>
						<img src='img/blog_{$this->entrada->getId()}.png' alt='Entrada {$this->entrada->getId()}'>
						<p>blog_{$this->entrada->getId()}.png <p>
					</div>
					
					<div class="subir-archivo2" onchange="changeHandler(event);">
						<label for="imagen" class="upload_button">
						Elige la imagen de la entrada
						<input id="imagen" type="file" name="imagen" class="upload">
						</label>
					</div>
					{$erroresCampos['imagen']}

				</div>
				<div>
					<ul class= "botones">
						<li><button type="submit" name="accion" value="editar">Editar Entrada</button>
						</li>
						<li>
						<button type="submit" name="accion" value="eliminar">Eliminar Entrada</button>
						</li>
						<li>
						<button type="submit" formaction="blog.php">Volver al blog</button>
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
		$id = $datos['id'];
		$titulo = trim($datos['titulo'] ??   '' );
		$titulo = filter_var($titulo, FILTER_SANITIZE_FULL_SPECIAL_CHARS);	

		$descripcion = trim($datos['descripcion'] ??   '' );
		$descripcion = filter_var($descripcion, FILTER_SANITIZE_FULL_SPECIAL_CHARS);	

		$contenido = trim($datos['contenido'] ??   '' );
		$contenido = filter_var($contenido, FILTER_SANITIZE_FULL_SPECIAL_CHARS);	
		
		$categoria = trim($datos['categoria'] ?? '');
        $categoria = filter_var($categoria, FILTER_SANITIZE_FULL_SPECIAL_CHARS);		

		$imagen = $_FILES['imagen'];
		if (isset($_POST["accion"]) && $_POST["accion"] == "editar") {
		if ( ! $titulo || empty($titulo)) {
			$this->errores['titulo'] = 'Se debe especificar el titulo de la entrada.';
		}
		if ( ! $descripcion || empty($descripcion)) {
			$this->errores['descripcion'] = 'Se debe especificar la descripcion de la entrada.';
		}
		if ( ! $contenido || empty($contenido)) {
			$this->errores['contenido'] = 'Se debe especificar el contenido de la entrada.';
		}

		if (count($this->errores) === 0) {
			if(isset($imagen['error']) && $imagen['error'] === UPLOAD_ERR_OK){
				$tipoArchivo = $imagen['type'];
				$rutaArchivo = $imagen['tmp_name'];				
				if($tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/png') {
					$entrada = Blog::edita($id, $titulo, $contenido, $descripcion,$categoria);
					$nombreImagen = 'blog_'.$id.'.png'; // Nombre de la imagen que se guardará
					$ruta = 'img/'.$nombreImagen; // Ruta donde se guardará la imagen
				move_uploaded_file($rutaArchivo, $ruta);
				} else {
				$this->errores['imagen'] = 'El archivo introducido no es valido';		
				}				
			}else{
				$entrada = Blog::edita($id, $titulo, $contenido, $descripcion, $categoria);
			}			
		}
	}
	elseif(isset($_POST["accion"]) && $_POST["accion"] == "eliminar") {
		Blog::borra($id);
	}
}
}
?>