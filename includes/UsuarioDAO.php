<?php

include_once ("Usuario.php");
include_once ("Aplicacion.php");

class UsuarioDAO 
{
    public $conn;
    public function __construct() 
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
    }
    //realiza el login, comprobando que el usuario existe y que la contraseña es correcta
    public static function login($mailUsuario, $password)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $usuario = self::buscaUsuarioMail($mailUsuario);
        if ($usuario && $usuario->compruebaPassword($password)) {
            return self::cargaRoles($usuario);
        }
        return false;
    }


    //busca el usuario por el mail
    public static function buscaUsuarioMail($mailUsuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM usuarios U WHERE U.correo='%s'", $conn->real_escape_string($mailUsuario));
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $user = new Usuario($fila['id'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], 
            $fila['password'], $fila['correo'], $fila['direccion'], $fila['rol']);
            $rs->free();

            return $user;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
    }

    //busca el usuario por el id
    public static function buscaPorId($idUsuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM usuarios WHERE id=%d", $idUsuario);
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $user = new Usuario($fila['id'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], 
            $fila['password'], $fila['correo'], $fila['direccion'], $fila['rol']);
            $rs->free();

            return $user;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $false;
    }

    //crea un nuevo usuario
    public static function crea($nombre, $password, $apellido1,$apellido2,$direccion,$correo)
    {
        $nuevoRol='U';
        $user = new Usuario($nuevaId,$nombreUsuario,$apellido1,$apellido2, self::hashPassword($password), $correo,$direccion,$nuevoRol);
        return self::guarda($user);
    }

    //inserta nuevo usuario
    private static function inserta($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO usuarios(nombre, apellido1, apellido2, password, correo, direccion, rol) VALUES ('%s', '%s', '%s','%s', '%s', '%s','%c')"
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->apellido1)
            , $conn->real_escape_string($usuario->apellido2)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->correo)
            ,$conn->real_escape_string($usuario->direccion)
        );
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
            return $usuario;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $false;
    }


    //borra el usuario
    private static function borra($idUsuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        if (!$idUsuario) {
            return false;
        } 
   
        $query = sprintf("DELETE FROM usuarios U WHERE U.id = %d"
            , $idUsuario
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }

    //actualiza el usuario a premium
    private static function hazPremium($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE usuarios U SET rol = 'P' WHERE U.id=%d"
        ,$usuario->id
        );
        if ( $conn->query($query) ) {
            return $usuario
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
        return false;
    }

     //actualiza el usuario a estandar
     private static function hazEstandar($usuario)
     {
         $conn = Aplicacion::getInstance()->getConexionBd();
         $query=sprintf("UPDATE usuarios U SET rol = 'U' WHERE U.id=%d"
         ,$usuario->id
         );
         if ( $conn->query($query) ) {
             return $usuario
         } else {
             error_log("Error BD ({$conn->errno}): {$conn->error}");
         }
         
         return false;
     }

    //guarda el usuario en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($user)
    {
        if ($this->id !== null) {
            //return self::actualiza($user);
        }
        return self::inserta($user);
    }


    //comprueba el hash de la contraseña
    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    //hashea la contraseña
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
?>