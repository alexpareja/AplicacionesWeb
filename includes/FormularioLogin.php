<?php
require_once __DIR__.'/Formulario.php';
require_once __DIR__.'/Usuario.php';

class FormularioLogin extends Formulario
{
    public function __construct() {
        parent::__construct('formLogin', ['urlRedireccion' => 'index.php']);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        // Se reutiliza el nombre de usuario introducido previamente o se deja en blanco
        $emailUsuario = $datos['emailUsuario'] ?? '';

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['emailUsuario', 'password'], $this->errores, 'span', array('class' => 'error'));

        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
        $html = <<<EOF
        $htmlErroresGlobales
        <div id="form">
            <fieldset>
                <legend>Iniciar Sesión</legend>
                <div>
                    <label for="email">Email:</label>
                    <input id="email" type="email" name="emailUsuario" value="$emailUsuario"/>
                    {$erroresCampos['emailUsuario']}
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input id="password" type="password" name="password"/>
                    {$erroresCampos['password']}
                </div>
                <div>
                    <button type="submit" name="login">Entrar</button>
                </div>
                    <p class="no-account">No tengo cuenta. <a href="registro.php">Regístrate aquí</a></p>
                    <p>* Campos obligatorios</p>
            </fieldset>
        </div>
        EOF;
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];
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
        
        if (count($this->errores) === 0) {
            $usuario = Usuario::login($emailUsuario, $password);
        
            if (!$usuario) {
                $this->errores[] = "El email o la contraseña no son correctas";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['email'] = $usuario->getCorreo();
                $_SESSION['direccion'] = $usuario->getDireccion();
                if($usuario->getNombre() == Usuario::ROL_ADMIN) {
                    $_SESSION['admin'] = true;
                }
                else {
                    $_SESSION['admin'] = false;
                }
            }
        }
    }
}