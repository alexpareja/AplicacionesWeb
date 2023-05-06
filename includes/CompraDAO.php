<?php

namespace es\ucm\fdi\aw;

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
            if($fila){
            $compra = new Compra($fila['id'], $fila['usuario'], $fila['producto'],$fila['talla'], $fila['fecha'], 
            $fila['cantidad'], $fila['precio'], $fila['cupon']);
            $rs->free();

            return $compra;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }
	
	   //busca el la compra por el id
    public function buscaPorProducto($idProd)
    {
        $query = sprintf("SELECT * FROM compras WHERE producto =%d", $idProd);
        $rs = $this->conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $compra = new Compra($fila['id'], $fila['usuario'], $fila['producto'],$fila['talla'], $fila['fecha'], 
            $fila['cantidad'], $fila['precio'], $fila['cupon']);
            $rs->free();

            return $compra;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }


    //crea una nueva compra, con la fecha actual 
    public function crea($idUsuario, $idProducto, $talla,$fecha,$cantidad,$precio,$idCupon)
    {
        $compra = new Compra($nuevaId=null,$idUsuario,$idProducto,$talla,$fecha, $cantidad, $precio, $idCupon);
        return self::guarda($compra);
    }

    //inserta nuevo usuario
    private function inserta($compra)
    {
        $query=sprintf("INSERT INTO compras(usuario, producto, talla, fecha, cantidad, precio, cupon) VALUES ('%d', '%d', '%s', '%s','%d', '%f', '%d')"
            , $this->conn->real_escape_string($compra->getIdUsuario())
            , $this->conn->real_escape_string($compra->getIdProducto())
            , $this->conn->real_escape_string($compra->getTalla())
            , $this->conn->real_escape_string($compra->getFecha())
            , $this->conn->real_escape_string($compra->getCantidad())
            , $this->conn->real_escape_string($compra->getPrecio())
			, $this->conn->real_escape_string($compra->getIdCupon())
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

    //guarda el usuario en la bbdd. Si existe lo actualiza y si no lo crea. Actualizado no implementado
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
                $compras[$id] = new Compra($row['id'], $row['usuario'], $row['producto'],$row['talla'], $row['fecha'],
                $row['cantidad'],$row['precio'], $row['cupon']);
            }
        }
        return $compras;
    }

    //obtiene todas las compras en un array
    public function getAllComprasUsuario($idUsuario)
    {
        $query = sprintf("SELECT * FROM compras WHERE usuario = %d", $idUsuario);
        $rs = $this->conn->query($query);
        $compras=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $compras[$id] = new Compra($row['id'], $row['usuario'], $row['producto'], $row['talla'],$row['fecha'],
                $row['cantidad'],$row['precio'], $row['cupon']);
            }
        }
        return $compras;
    }
}
?>