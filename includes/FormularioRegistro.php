<?php
namespace es\ucm\fdi\aw;

class FormularioRegistro extends Formulario
{
    public function __construct() {
        parent::__construct('formRegistro', ['urlRedireccion' => 'index.php']);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        $nombreUsuario = $datos['nombreUsuario'] ?? '';
        $apellido1Usuario = $datos['apellido1Usuario'] ?? '';
        $apellido2Usuario = $datos['apellido2Usuario'] ?? '';
        $emailUsuario = $datos['emailUsuario'] ?? '';
        $direccionUsuario = $datos['direccionUsuario'] ?? '';

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['nombreUsuario', 'apellido1Usuario', 'emailUsuario', 'password', 'password2', 'direccionUsuario', 'registro'], $this->errores, 'span', array('class' => 'error'));

        $html = <<<EOF
        $htmlErroresGlobales
        <div id = "login-registro-form">
            <fieldset>
                <legend>¿Nuevo cliente?</legend>
                <p class="account">Crea tu cuenta aquí. ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
                <div class="inputbox">
                    <input id="nombreUsuario" type="text" name="nombreUsuario" value="$nombreUsuario" placeholder="Introduce tu nombre">
                    <label for="nombreUsuario">Nombre*</label>
                    <span id="errorNombre">{$erroresCampos['nombreUsuario']}</span>
                </div>
                <div class="inputbox">
                    <input id="apellido1Usuario" type="text" name="apellido1Usuario" value="$apellido1Usuario" placeholder="Introduce tu primer apellido">
                    <label for="apellido1Usuario">Primer apellido*</label>
                    <span id="errorApellido">{$erroresCampos['apellido1Usuario']}</span>
                </div>
                <div class="inputbox">
                    <input id="apellido2Usuario" type="text" name="apellido2Usuario" value="$apellido2Usuario" placeholder="Introduce tu segundo apellido">
                    <label for="apellido2Usuario">Segundo apellido</label>
                </div>
                <div class="inputbox">
                    <input id="emailUsuario" type="email" name="emailUsuario" value="$emailUsuario" placeholder="Introduce tu correo electrónico">
                    <label for="emailUsuario">Correo electrónico*</label>
                    <span id="errorEmail">{$erroresCampos['emailUsuario']}</span>
                </div>
                <div class="inputbox">
                    <input id="password" type="password" name="password" placeholder="Introduce tu contraseña">
                    <label for="password">Contraseña*</label>
                    <span id="errorPass">{$erroresCampos['password']}</span>
                </div>
                <div class="inputbox">      
                    <input id="password2" type="password" name="password2" placeholder="Repite tu contraseña">
                    <label for="password2">Reintroduce la contraseña*</label>
                    <span id="errorPass2">{$erroresCampos['password2']}</span>
                </div>
                <div class="inputbox">
                    <input id="direccionUsuario" type="text" name="direccionUsuario" value="$direccionUsuario" placeholder="Introduce tu dirección">
                    <label for="direccionUsuario">Dirección*</label>
                    <span id="errorDir">{$erroresCampos['direccionUsuario']}</span>
                </div>
                <div>
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" class="terminos">Acepto los <a href="terminosycondiciones.php">términos y condiciones</a>*</label>
                </div>
                <span id="errorRegistro">{$erroresCampos['registro']}</span>
                <div>
                    <button type="submit" name="registro">Registrarse</button>
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

        $emailUsuario = trim($datos['emailUsuario'] ?? '');
        $emailUsuario = filter_var($emailUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $emailUsuario || empty($emailUsuario) ) {
            $this->errores['emailUsuario'] = 'El correo eléctronico no puede estar vacío.';
        }

        $password = trim($datos['password'] ?? '');
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password || empty($password)) {
            $this->errores['password'] = 'La contraseña no puede estar vacía.';
        }
        if ( ! $password || mb_strlen($password) < 8 ) {
            $this->errores['password'] = 'La contraseña tiene que tener una longitud de al menos 8 caracteres.';
        }

        $password2 = trim($datos['password2'] ?? '');
        $password2 = filter_var($password2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password2 || $password != $password2 ) {
            $this->errores['password2'] = 'Las contraseñas deben coincidir.';
        }

        $direccionUsuario = trim($datos['direccionUsuario'] ?? '');
        $direccionUsuario = filter_var($direccionUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $direccionUsuario || empty($direccionUsuario) ) {
            $this->errores['direccionUsuario'] = 'La dirección no puede estar vacía.';
        }

        if (count($this->errores) === 0) {
            $usuario = Usuario::buscaUsuarioMail($emailUsuario);
	
            if ($usuario) {
                $this->errores['registro'] = "Ya exite un usuario con ese correo electrónico";
            } else {
                $usuario = Usuario::crea($nombreUsuario, $password, $apellido1Usuario, $apellido2Usuario, $direccionUsuario, $emailUsuario);
                $_SESSION['login'] = true;
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['apellido1'] = $usuario->getApellido1();
                $_SESSION['apellido2'] = $usuario->getApellido2();
                $_SESSION['email'] = $usuario->getCorreo();
                $_SESSION['direccion'] = $usuario->getDireccion();
                $_SESSION['admin'] = false;
            }
        }
    }
}