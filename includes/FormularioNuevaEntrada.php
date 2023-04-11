<?php
namespace es\ucm\fdi\aw;


class FormularioNuevaEntrada extends Formulario
{
    public function __construct() {
        parent::__construct('formNuevaEntrada', array('urlRedireccion' => 'blog.php', 'enctype' => 'multipart/form-data'));
    }

	private $idAutor; 

	public function setAutor($idAutor) {
		$this->idAutor=$idAutor;
    }

    protected function generaCamposFormulario(&$datos)
    {
		$titulo = $datos['titulo'] ?? '';

		$descripcion = $datos['descripcion'] ?? '';

		$contenido = $datos['contenido'] ?? '';
		
		$htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
		$erroresCampos = self::generaErroresCampos(['titulo', 'contenido','descripcion', 'imagen'], $this->errores, 'span', array('class' => 'error'));


        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
		$html=<<<EOF
		$htmlErroresGlobales
		<div id="newE-form">
			<fieldset>
				<legend>Nueva Entrada</legend>
				<div>
					<p><label for="titulo">Titulo:</label></p>
					<p><input id="titulo" type="text" name="titulo" value='$titulo'></p>
					{$erroresCampos['titulo']}
				</div>
				<div>
					<p><label for="descripcion">Descripción:</label></p>
					<p><textarea id="descripcion" name="descripcion" value='$descripcion'></textarea></p>
					{$erroresCampos['descripcion']}
				</div>
				<div>
					<p><label for="contenido">Contenido:</label></p>
					<p><textarea id="contenido" name="contenido" value='$contenido'></textarea></p>
					{$erroresCampos['contenido']}
				</div>
				<div>
				<label for="imagen">Imagen:</label>
					<div id='subir-archivo1' class='subir-archivo1'>
						<p>Previsualización de la imagen</p>
					</div>
					<div class="subir-archivo2" onchange="changeHandler(event);">
						<label for="imagen" class="upload_button">
						<p>Elige la imagen de la entrada</p>
						<input id="upload-input" type="file" name="imagen">
						</label>
					</div>
					{$erroresCampos['imagen']}

				</div>
				<div>
				<input type="hidden" name="autor" value="{$this->idAutor}">
					<ul class= "botones">
						<li><button type="submit">Añadir Entrada</button>
						</li>
						<li>
						<button type="submit" formaction="blog.php">Volver al Blog</button>
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
		
		$titulo = trim($datos['titulo'] ?? '');
        $titulo = filter_var($titulo, FILTER_SANITIZE_FULL_SPECIAL_CHARS);		
		
		$descripcion = trim($datos['descripcion'] ?? '');
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		$contenido = trim($datos['contenido'] ?? '');
        $contenido = filter_var($contenido, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
		$imagen = $_FILES['imagen'];
		
		if ( ! $titulo || empty($titulo)) {
            $this->errores['titulo'] = 'Se debe especificar el titulo de la entrada nueva.';
        }
		if ( ! $descripcion || empty($descripcion)) {
            $this->errores['descripcion'] = 'Se debe introducir una descripción de la entrada.';
        }
		if ( ! $contenido || empty($contenido)) {
            $this->errores['contenido'] = 'La entrada no tiene contenido.';
        }
		
        if (count($this->errores) === 0) {
			$tipoArchivo = $imagen['type'];
			$rutaArchivo = $imagen['tmp_name'];
			
			if($tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/png') {
				$blog = Blog::crea($titulo, $contenido, $descripcion, $this->idAutor);
				echo $titulo;
				echo $contenido;
				echo $descripcion;
				$nombreImagen = 'blog_'.$blog->getID().'.png'; // Nombre de la imagen que se guardará
				$ruta = 'img/'.$nombreImagen; // Ruta donde se guardará la imagen

				move_uploaded_file($rutaArchivo, $ruta);
			} else {
				$this->errores['imagen'] = 'El archivo introducido no es valido';		
				}	
        }
    }
}