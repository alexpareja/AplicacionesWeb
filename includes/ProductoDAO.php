<?php

include_once ("Producto.php");
include_once ("Aplicacion.php");

class ProductoDAO 
{
    public $conn;
    public function __construct() 
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
    }

    //busca el producto por el nombre
    public static function buscaPorNombre($nombreProducto)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM productos WHERE nombre=%s", $nombreProducto);
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $user = new Producto($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['precio'], 
            $fila['stockXS'], $fila['stockS'], $fila['stockM'], $fila['stockL'], $fila['stockXL']);
            $rs->free();

            return $user;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $false;
    }

    //busca el producto por el id
    public static function buscaPorId($idProducto)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM productos WHERE id=%d", $idProducto);
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $prod = new Producto($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['precio'], 
            $fila['stockXS'], $fila['stockS'], $fila['stockM'], $fila['stockL'], $fila['stockXL']);
            $rs->free();

            return $prod;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $false;
    }

    //devuelve todos los productos en un array
    public static function getTienda()
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = "SELECT * FROM productos";

        $rs = $this->ExecuteQuery($query);

        foreach ($rs as $i => $value) 
        {
            $productos[] = new Producto($rs[$i]['id'], $rs[$i]['nombre'], $rs[$i]['descripcion'], $rs[$i]['precio'],
             $rs[$i]['stockXS'],$rs[$i]['stockS'],$rs[$i]['stockM'],$rs[$i]['stockL'],$rs[$i]['stockXL']);
        }

        return $productos;
    }

    //crea un nuevo producto, con stock 0 
    public static function crea($nombre, $descripcion, $precio)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $prod = new Producto($nuevaId,$nombre,$descripcion,$precio,0,0,0,0,0);
        return self::guarda($prod);
    }

    //inserta nuevo producto
    private static function inserta($producto)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO productos(nombre, descripcion, precio, stockXS, stockS, stockM, stockL,stockXL) VALUES ('%s', '%s', '%f','%d', '%d', '%d','%d','%d')"
            , $conn->real_escape_string($producto->nombre)
            , $conn->real_escape_string($producto->descripcion)
            , $conn->real_escape_string($producto->precio)
            , $producto->stockXS
            , $producto->stockS
            , $producto->stockM
            , $producto->stockL
            , $producto->stockXL
        );
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
            return $producto;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $false;
    }


    //borra el producto
    private static function borra($idProducto)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        if (!$idProducto) {
            return false;
        } 
    
        $query = sprintf("DELETE FROM productos U WHERE U.id = %d"
            , $idProducto
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }


    //funcion para actualizar stock->guardar cantidades en array stock['xs' = $cantidadXS, 's' = $cantidadS...]


    //guarda el producto en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($producto)
    {
        if ($this->id !== null) {
            //return self::actualiza($producto); 
        }
        return self::inserta($producto);
    }
}
?>