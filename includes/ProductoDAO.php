<?php

include_once ("Producto.php");
include_once ("Aplicacion.php");

class ProductoDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();

    }

    //busca el producto por el nombre
    public function buscaPorNombre($nombreProducto)
    {
        $query = sprintf("SELECT * FROM productos WHERE nombre='%s'", $nombreProducto);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $prod = new Producto($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['precio'], 
            $fila['stockXS'], $fila['stockS'], $fila['stockM'], $fila['stockL'], $fila['stockXL']);
            $rs->free();

            return $prod;
            }
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
    }

    //busca el producto por el id
    public function buscaPorId($idProducto)
    {
        $query = sprintf("SELECT * FROM productos WHERE id=%d", $idProducto);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $prod = new Producto($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['precio'], 
            $fila['stockXS'], $fila['stockS'], $fila['stockM'], $fila['stockL'], $fila['stockXL']);
            $rs->free();

            return $prod;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //devuelve todos los productos en un array
    public function getTienda()
    {
        $query = "SELECT * FROM productos";

        $rs = $this->conn->query($query);
        $productos=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $productos[$id] = new Producto($row['id'], $row['nombre'], $row['descripcion'], $row['precio'],
                $row['stockXS'],$row['stockS'],$row['stockM'],$row['stockL'],$row['stockXL']);
            }
        }
        return $productos;
    }

    //crea un nuevo producto, con stock 0 
    public function crea($nombre, $descripcion, $precio, $xs, $s, $m, $l, $xl)
    {
        $prod = new Producto($nuevaId=null,$nombre,$descripcion,$precio,$xs,$s,$m,$l,$xl);
        return self::guarda($prod);
    }

    //inserta nuevo producto
    private function inserta($producto)
    {
        $query=sprintf("INSERT INTO productos(nombre, descripcion, precio, stockXS, stockS, stockM, stockL,stockXL) VALUES ('%s', '%s', '%f','%d', '%d', '%d','%d','%d')"
            , $this->conn->real_escape_string($producto->getNombre())
            , $this->conn->real_escape_string($producto->getDescripcion())
            , $this->conn->real_escape_string($producto->getPrecio())
            , $producto->getStockXS()
            , $producto->getStockS()
            , $producto->getStockM()
            , $producto->getStockL()
            , $producto->getStockXL()
        );
        if ( $this->conn->query($query) ) {
            $producto->setId($this->conn->insert_id);
            return $producto;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
    }


    //borra el producto
    public function borra($idProducto)
    {
        if (!$idProducto) {
            return false;
        } 
    
        $query = sprintf("DELETE FROM productos WHERE id =%d",$idProducto);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }


    //funcion para actualizar stock->guardar cantidades en array stock['xs' = $cantidadXS, 's' = $cantidadS...]


    //guarda el producto en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($producto)
    {
        if ($producto->getId() !== null) {
            //return self::actualiza($producto); 
        }
        return self::inserta($producto);
    }
}
?>