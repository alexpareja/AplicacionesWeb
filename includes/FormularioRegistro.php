<?php
require_once __DIR__.'/Formulario.php';
require_once __DIR__.'/Usuario.php';

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
        $erroresCampos = self::generaErroresCampos(['nombreUsuario', 'apellido1Usuario', 'emailUsuario', 'password', 'password2', 'direccionUsuario'], $this->errores, 'span', array('class' => 'error'));

        $html = <<<EOF
        $htmlErroresGlobales
        <form method="post">
            <fieldset>
                <legend>Registrar Usuario</legend>
                <div>
                    <label for="nombreUsuario">Nombre de usuario:</label>
                    <input id="nombreUsuario" type="text" name="nombreUsuario" value="$nombreUsuario" />
                    {$erroresCampos['nombreUsuario']}
                </div>
                <div>
                    <label for="apellido1Usuario">Primer apellido:</label>
                    <input id="apellido1Usuario" type="text" name="apellido1Usuario" value="$apellido1Usuario" />
                    {$erroresCampos['apellido1Usuario']}
                </div>
                <div>
                    <label for="apellido2Usuario">Segundo apellido:</label>
                    <input id="apellido2Usuario" type="text" name="apellido2Usuario" value="$apellido2Usuario" />
                </div>
                <div>
                    <label for="emailUsuario">Email:</label>
                    <input id="emailUsuario" type="text" name="emailUsuario" value="$emailUsuario" />
                    {$erroresCampos['emailUsuario']}
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input id="password" type="password" name="password" />
                    {$erroresCampos['password']}
                </div>
                <div>
                    <label for="password2">Reintroduce la contraseña:</label>
                    <input id="password2" type="password" name="password2" />
                    {$erroresCampos['password2']}
                </div>
                <div>
                    <label for="direccionUsuario">Dirección:</label>
                    <input id="direccionUsuario" type="text" name="direccionUsuario" value="$direccionUsuario" />
                    {$erroresCampos['direccionUsuario']}
                </div>
                <div>
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" class="terminos">Acepto los <a href="terminosycondiciones.php">términos y condiciones</a></label/>
                </div>
                <div>
                    <button type="submit">Registrar</button>
                </div>
                </fieldset>
        </form>
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
        if ( ! $apellido1Usuario || empty($nombreUsuario)) {
            $this->errores['apellido1Usuario'] = 'El primer apellido del usuario no puede estar vacío.';
        }

        $password = trim($datos['password'] ?? '');
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password || empty($password)) {
            $this->errores['password'] = 'La contraseña no puede estar vacía.';
        }
        if ( ! $password || mb_strlen($password) < 5 ) {
            $this->errores['password'] = 'La contraseña tiene que tener una longitud de al menos 5 caracteres.';
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
                $this->errores[] = "El usuario ya existe";
            } else {
                $usuario = Usuario::crea($nombreUsuario, $password, $apellido1Usuario, $apellido2Usuario, $direccionUsuario, $emailUsuario);
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $usuario->getNombre();
            }
        }
    }
}