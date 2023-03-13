<?php

include_once ("Usuario.php");
include_once ("Aplicacion.php");

class UsuarioDAO 
{
    public $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();
    }
    //realiza el login, comprobando que el usuario existe y que la contraseña es correcta
    public function login($mailUsuario, $password)
    {
        $usuario = self::buscaUsuarioMail($mailUsuario);
        if ($usuario && $usuario->compruebaPassword($password)) {
            return self::cargaRoles($usuario);
        }
        return false;
    }


    //busca el usuario por el mail
    public function buscaUsuarioMail($mailUsuario)
    {
        $query = sprintf("SELECT * FROM usuarios U WHERE U.correo='%s'", $conn->real_escape_string($mailUsuario));
        $rs = $this->conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $user = new Usuario($fila['id'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], 
            $fila['password'], $fila['correo'], $fila['direccion'], $fila['rol']);
            $rs->free();

            return $user;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //busca el usuario por el id
    public function buscaPorId($idUsuario)
    {
        $query = sprintf("SELECT * FROM usuarios WHERE id=%d", $idUsuario);
        $rs = $this->conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $user = new Usuario($fila['id'], $fila['nombre'], $fila['apellido1'], $fila['apellido2'], 
            $fila['password'], $fila['correo'], $fila['direccion'], $fila['rol']);
            $rs->free();

            return $user;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //crea un nuevo usuario
    public static function crea($nombre, $password, $apellido1,$apellido2,$direccion,$correo)
    {
        $nuevoRol='U';
        $user = new Usuario($nuevaId=null,$nombreUsuario,$apellido1,$apellido2, self::hashPassword($password), $correo,$direccion,$nuevoRol);
        return self::guarda($user);
    }

    //inserta nuevo usuario
    private function inserta($usuario)
    {
        $query=sprintf("INSERT INTO usuarios(nombre, apellido1, apellido2, password, correo, direccion, rol) VALUES ('%s', '%s', '%s','%s', '%s', '%s','%c')"
            , $this->conn->real_escape_string($usuario->nombre)
            , $this->conn->real_escape_string($usuario->apellido1)
            , $this->conn->real_escape_string($usuario->apellido2)
            , $this->conn->real_escape_string($usuario->password)
            , $this->conn->real_escape_string($usuario->correo)
            ,$this->conn->real_escape_string($usuario->direccion)
        );
        if ( $this->conn->query($query) ) {
            $usuario->setId($conn->insert_id);
            return $usuario;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return $false;
    }


    //borra el usuario
    private function borra($idUsuario)
    {
        if (!$idUsuario) {
            return false;
        } 
   
        $query = sprintf("DELETE FROM usuarios WHERE id =%d", $idUsuario);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }

    //actualiza el usuario a premium
    private function hazPremium($usuario)
    {
        $query=sprintf("UPDATE usuarios SET rol = 'P' WHERE id=%d"
        ,$usuario->getId()
        );
        if ( $this->conn->query($query) ) {
            return $usuario
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        
        return false;
    }

     //actualiza el usuario a estandar
     private function hazEstandar($usuario)
     {
         $query=sprintf("UPDATE usuarios SET rol = 'U' WHERE id=%d"
         ,$usuario->getId()
         );
         if ( $this->conn->query($query) ) {
             return $usuario
         } else {
             error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
         }
         
         return false;
     }

    //guarda el usuario en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($user)
    {
        if ($user->getId()!== null) {
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