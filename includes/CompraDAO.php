<?php

include_once ("Compra.php");
include_once ("Aplicacion.php");

class CompraDAO 
{
    public $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();
    }
    
    //busca el la compra por el id
    public function buscaPorId($idCompra)
    {
        $query = sprintf("SELECT * FROM compras WHERE id =%d", $idCompra);
        $rs = $this->conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $compra = new Compra($fila['id'], $fila['usuario'], $fila['producto'], $fila['fecha'], 
            $fila['cantidad'], $fila['precio']);
            $rs->free();

            return $compra;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //crea una nueva compra, con la fecha actual 
    public function crea($idUsuario, $idProducto, $fecha,$cantidad,$precio)
    {
        $compra = new Compra($nuevaId=null,$idUsuario,$idProducto,$fecha, $cantidad, $precio);
        return self::guarda($compra);
    }

    //inserta nuevo usuario
    private function inserta($compra)
    {
        $query=sprintf("INSERT INTO compras(usuario, producto, fecha, cantidad, precio) VALUES ('%d', '%d', '%s','%d', '%f')"
            , $this->conn->real_escape_string($usuario->getIdUsuario())
            , $this->conn->real_escape_string($usuario->getIdProducto())
            , $this->conn->real_escape_string($usuario->getFecha())
            , $this->conn->real_escape_string($usuario->getCantidad())
            , $this->conn->real_escape_string($usuario->getPrecio())
        );
        if ( $this->conn->query($query) ) {
            $compra->setId($this->conn->insert_id);
            return $compra;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }


    //borra el usuario
    public function borra($idCompra)
    {
        if (!$idCompra) {
            return false;
        } 
   
        $query = sprintf("DELETE FROM compras WHERE id =%d", $idCompra);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }

    //guarda el usuario en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($compra)
    {
        if ($compra->getId()!== null) {
            //return self::actualiza($user);
        }
        return self::inserta($compra);
    }

    //obtiene todas las compras en un array
    public function getAllCompras()
    {
        $query = "SELECT * FROM compras";

        $rs = $this->conn->query($query);
        $compras=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $compras[$id] = new Compra($row['id'], $row['usuario'], $row['producto'], $row['fecha'],
                $row['cantidad'],$row['precio']);
            }
        }
        return $compras;
    }

    //obtiene todas las compras en un array
    public function getAllComprasUsuario($idUsuario)
    {
        $query = sprintf("SELECT * FROM compras WHERE id =%d", $idCompra);
        $rs = $this->conn->query($query);
        $compras=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $compras[$id] = new Compra($row['id'], $row['usuario'], $row['producto'], $row['fecha'],
                $row['cantidad'],$row['precio']);
            }
        }
        return $compras;
    }
}
?>