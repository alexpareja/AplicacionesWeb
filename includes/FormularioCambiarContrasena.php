<?php
namespace es\ucm\fdi\aw;

class FormularioCambiarContrasena extends Formulario
{
    private $usuario;

    public function __construct() {
        parent::__construct('formCPass', ['urlRedireccion' => 'miPerfil.php']);
    }

    public function setUsuario($usuario) {
        $this->usuario=$usuario;
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['pass', 'newPass', 'newPass2'], $this->errores, 'span', array('class' => 'error'));

        $html = <<<EOF
        $htmlErroresGlobales
        <div id = "login-registro-form">
            <fieldset>
                <legend>Información usuario</legend>
                <div class="inputbox">
                    <input id="pass" type="password" name="pass" placeholder="Introduce tu contraseña actual">
                    <label for="pass">Contraseña actual</label>
                    <span id="errorAPass">{$erroresCampos['pass']}</span>
                </div>
                <div class="inputbox">
                    <input id="newPass" type="password" name="newPass" placeholder="Introduce tu nueva contraseña">
                    <label for="newPass">Nueva contraseña</label>
                    <span id="errorPass">{$erroresCampos['newPass']}</span>
                </div>
                <div class="inputbox">
                    <input id="newPass2" type="password" name="newPass2" placeholder="Repite tu nueva contraseña">
                    <label for="newPass2">Repite nueva contraseña</label>
                    <span id="errorNewPass2">{$erroresCampos['newPass2']}</span>
                </div>
                <div>
                    <button type="submit" name="cambiarPass">Cambiar contraseña</button>
                </div>
            </fieldset>
        </div>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];

        $pass = trim($datos['pass'] ?? '');
        $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($pass != $this->usuario->getPassword()) {
            $this->errores['errorAPass'] = 'La contraseña es incorrecta.';
        }

        $newPass = trim($datos['newPass'] ?? '');
        $newPass = filter_var($newPass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $newPass || empty($newPass)) {
            $this->errores['newPass'] = 'La contraseña no puede estar vacía.';
        }
        if ( ! $newPass || mb_strlen($newPass) < 8 ) {
            $this->errores['newPass'] = 'La contraseña tiene que tener una longitud de al menos 8 caracteres.';
        }
        if ($newPass == $pass) {
            $this->errores['newPass'] = 'La contraseña no puede ser igual a la actual.';
        }

        $newPass2 = trim($datos['newPass2'] ?? '');
        $newPass2 = filter_var($newPass2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $newPass2 || $newPass2 != $newPass2 ) {
            $this->errores['newPass2'] = 'Las contraseñas deben coincidir.';
        }

        if (count($this->errores) === 0) {
            $id = $this->usuario->getId();
            $nombre = $this->usuario->getNombre();
            $apellido1 = $this->usuario->getApellido1();
            $apellido2 = $this->usuario->getApellido2();
            $correo = $this->usuario->getCorreo();
            $direccion = $this->usuario->getDireccion();
            $rol = $this->usuario->getRol();
            $usuario = Usuario::editarUsuario($id, $nombre, $apellido, $apellido2, $password, $correo, $direccion, $rol);
        }
    }
}