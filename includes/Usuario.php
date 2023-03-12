<?php
include_once ("UsuarioDAO.php");

class Usuario
{

    public const ROL_ADMIN = 'A';

    public const ROL_USUARIO= 'U';

    public const ROL_PREMIUM = 'P';

    private $id;

    private $nombre;

    private $apellido1;

    private $apellido2;

    private $password;

    private $correo;

    private $direccion;

    private $rol;

    public function __construct($id=null, $nombreUsuario, $apellido1, $apellido2, $password,$correo,$direccion,$rol)
    {
        $this->id = $id;
        $this->nombre = $nombreUsuario;
        $this->password = $password;
        $this->direccion = $direccion;
        $this->rol = $rol;
        $this->correo=$correo;
        $this->apellido1=$apellido1;
        $this->apellido2=$apellido2;
    }

    public static function login($mailUsuario, $password)
    {
        $usuarioDAO= new UsuarioDAO();
        return $usuarioDAO->login($mailUsuario,$password);
    }

    public static function buscaPorId($idUsuario)
    {
        $usuarioDAO= new UsuarioDAO();
        return $usuarioDAO->buscaPorId($idUsuario);
    }

    public static function crea($nombre, $password, $apellido1,$apellido2,$direccion,$correo)
    {
        $usuarioDAO= new UsuarioDAO();
        return $usuarioDAO->crea($nombre, $password, $apellido1,$apellido2,$direccion,$correo);
    }

    //borra el usuario
    public function borra($usuario)
    {
        $usuarioDAO= new UsuarioDAO();
        return $usuarioDAO->borra($usuario->id);
    }
    
    //cambia el rol del usuario a premium
    public function hazPremium($usuario)
    {
        $usuarioDAO= new UsuarioDAO();
        return $usuarioDAO->hazPremium($usuario);
    }

     //cambia el rol del usuario a premium
     public function hazEstandar($usuario)
     {
         $usuarioDAO= new UsuarioDAO();
         return $usuarioDAO->hazEstandar($usuario);
     }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido1()
    {
        return $this->apellido1;
    }

    public function getApellido2()
    {
        return $this->apellido2;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getDireccion()
    {
        return $this->correo;
    }

    public function getRol()
    {
        return $this->rol;
    }
}
?>