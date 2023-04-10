<?php
namespace es\ucm\fdi\aw;

class FormularioEditarUsuario extends Formulario
{
    private $usuario;

    public function __construct() {
        parent::__construct('formEUser', ['urlRedireccion' => 'miPerfil.php']);
    }

    public function setUsuario($usuario) {
        $this->usuario=$usuario;
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['nombreUsuario', 'apellido1Usuario', 'direccionUsuario'], $this->errores, 'span', array('class' => 'error'));

        $html = <<<EOF
        $htmlErroresGlobales
        <div id = "login-registro-form">
            <fieldset>
                <legend>Información usuario</legend>
                <div class="inputbox">
                    <input id="nombreUsuario" type="text" name="nombreUsuario" value="{$this->usuario->getNombre()}" placeholder="Introduce tu nombre">
                    <label for="nombreUsuario">Nombre*</label>
                    <span id="errorNombre">{$erroresCampos['nombreUsuario']}</span>
                </div>
                <div class="inputbox">
                    <input id="apellido1Usuario" type="text" name="apellido1Usuario" value="{$this->usuario->getApellido1()}" placeholder="Introduce tu primer apellido">
                    <label for="apellido1Usuario">Primer apellido*</label>
                    <span id="errorApellido">{$erroresCampos['apellido1Usuario']}</span>
                </div>
                <div class="inputbox">
                    <input id="apellido2Usuario" type="text" name="apellido2Usuario" value="{$this->usuario->getApellido2()}" placeholder="Introduce tu segundo apellido">
                    <label for="apellido2Usuario">Segundo apellido</label>
                </div>
                <div class="inputbox">
                    <input id="direccionUsuario" type="text" name="direccionUsuario" value="{$this->usuario->getDireccion()}" placeholder="Introduce tu dirección">
                    <label for="direccionUsuario">Dirección*</label>
                    <span id="errorDir">{$erroresCampos['direccionUsuario']}</span>
                </div>
                <div>
                    <button type="submit" name="editarUser">Cambiar datos</button>
                </div>
                <p>* Campos obligatorios</p>
            </fieldset>
        </div>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];

        $nombreUsuario = trim($datos['nombreUsuario'] ?? '');
        $nombreUsuario = filter_var($nombreUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $nombreUsuario || empty($nombreUsuario)) {
            $this->errores['nombreUsuario'] = 'El nombre de usuario no puede estar vacío.';
        }

        $apellido1Usuario = trim($datos['apellido1Usuario'] ?? '');
        $apellido1Usuario = filter_var($apellido1Usuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $apellido1Usuario || empty($apellido1Usuario)) {
            $this->errores['apellido1Usuario'] = 'El primer apellido del usuario no puede estar vacío.';
        }

        $apellido2Usuario = trim($datos['apellido2Usuario'] ?? '');
        $apellido2Usuario = filter_var($apellido2Usuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $direccionUsuario = trim($datos['direccionUsuario'] ?? '');
        $direccionUsuario = filter_var($direccionUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $direccionUsuario || empty($direccionUsuario) ) {
            $this->errores['direccionUsuario'] = 'La dirección no puede estar vacía.';
        }

        if (count($this->errores) === 0) {
            $id = $this->usuario->getId();
            $password = $this->usuario->getPassword();
            $correo = $this->usuario->getCorreo();
            $rol = $this->usuario->getRol();
            $usuario = Usuario::editarUsuario($id, $nombreUsuario, $apellido1Usuario, $apellido2Usuario, $password, $correo, $direccionUsuario, $rol);
            if($usuario) {
                $_SESSION['nombre'] = $this->usuario->getNombre();
                $_SESSION['apellido1'] = $this->usuario->getApellido1();
                $_SESSION['apellido2'] = $this->usuario->getApellido2();
                $_SESSION['direccion'] = $this->usuario->getDireccion();
            }
        }
    }
}