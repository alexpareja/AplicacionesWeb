<?php
namespace es\ucm\fdi\aw;

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
        $erroresCampos = self::generaErroresCampos(['emailUsuario', 'password', 'login'], $this->errores, 'span', array('class' => 'error'));

        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
        $html = <<<EOF
        $htmlErroresGlobales
        <div id="login-registro-form">
          <fieldset>
            <legend>¿Ya estás registrado?</legend>
            <p class="account">Inicia sesión ahora para aprovecharte de todos los beneficios de la cuenta de cliente de La Quinta Caja ¿Nuevo cliente? <a href="registro.php">Regístrate aquí</a></p>
            <div class="inputbox">
                <input id="emailUsuario" type="email" name="emailUsuario" value="$emailUsuario" required/>
                <label for="emailUsuario">Correo electrónico</label>
                <span id="errorEmail">{$erroresCampos['emailUsuario']}</span>
            </div>
            <div class="inputbox">
                <input id="password" type="password" name="password" required/>
                <label for="password">Contraseña</label>
                <span id="errorPass">{$erroresCampos['password']}</span>
            </div>
            <span id="errorLogin">{$erroresCampos['login']}</span>
            <div>
              <button type="submit" name="login">Iniciar sesión</button>
            </div>
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
        if (!$emailUsuario || empty($emailUsuario)) {
            $this->errores['emailUsuario'] = 'El correo electrónico no puede estar vacío';
        }

        
        $password = trim($datos['password'] ?? '');
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$password || empty($password)) {
            $this->errores['password'] = 'La contraseña no puede estar vacía.';
        }
 
        if (count($this->errores) === 0) {
            $usuario = Usuario::login($emailUsuario, $password);
        
            if (!$usuario) {
                $this->errores['login'] = "Lamentablemente, ha habido un error en el inicio de sesión. Asegúrate de que estás utilizando la dirección de correo electrónico y la contraseña correctas.";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['apellido1'] = $usuario->getApellido1();
                $_SESSION['apellido2'] = $usuario->getApellido2();
                $_SESSION['email'] = $usuario->getCorreo();
                $_SESSION['direccion'] = $usuario->getDireccion();
                if($usuario->getRol() == Usuario::ROL_ADMIN) {
                    $_SESSION['admin'] = true;
                }
                else {
                    $_SESSION['admin'] = false;
                }
            }
        }
    }
}