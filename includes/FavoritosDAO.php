<?php

namespace es\ucm\fdi\aw;

class FavoritosDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();

    }

    public function buscaPorUsuario($usuario)
    {
        $query = sprintf("SELECT * FROM listadeseos WHERE usuario=%d", $usuario);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $fav = new Favoritos($fila['id'], $fila['usuario'], $fila['producto']);
            $rs->free();

            return $fav;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    public function buscaPorId($idFav)
    {
        $query = sprintf("SELECT * FROM listadeseos WHERE id=%d", $idFav);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $fav = new Favoritos($fila['id'], $fila['usuario'], $fila['producto']);
            $rs->free();

            return $fav;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    public function getFavoritos()
    {
        $query = "SELECT * FROM listadeseos";

        $rs = $this->conn->query($query);
        $favs=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $favs[$id] = new Favoritos($fila['id'], $fila['usuario'], $fila['producto']);
            }
        }
        return $favs;
    }

    public function getFavoritosUsuario($idUsuario)
    {
        $query = sprintf("SELECT * FROM listadeseos WHERE usuario = %d", $idUsuario);
        $rs = $this->conn->query($query);
        $favs=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $favs[$id] = new Favoritos($row['id'], $row['usuario'], $row['producto']);
            }
        }
        return $favs;
    }

    public function crea($usuario, $producto)
    {
        $fav = new Favoritos($nuevaId=null,$usuario,$producto);
        return self::inserta($fav);
    }

    private function inserta($fav)
    {
        $query=sprintf("INSERT INTO listadeseos(usuario, producto) VALUES ('%d','%d')"
            , $this->conn->real_escape_string($fav->getUsuario())
            , $this->conn->real_escape_string($fav->getProducto())
        );
        if ( $this->conn->query($query) ) {
            $fav->setId($this->conn->insert_id);
            return $fav;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
    }

    public function borra($idUsuario, $idProducto)
    {
        if (!$idProducto || !$idUsuario) {
            return false;
        }

        $query = sprintf("DELETE FROM listadeseos WHERE usuario=%d AND producto=%d", $idUsuario, $idProducto);
        if (!$this->conn->query($query)) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
}
?>