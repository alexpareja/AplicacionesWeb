<?php

namespace es\ucm\fdi\aw;

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
            $prod = new Producto($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['precio'], $fila['oferta'],
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
            $prod = new Producto($fila['id'], $fila['nombre'], $fila['descripcion'], $fila['precio'], $fila['oferta'],
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
                $productos[$id] = new Producto($row['id'], $row['nombre'], $row['descripcion'], $row['precio'], $row['oferta'],
                $row['stockXS'],$row['stockS'],$row['stockM'],$row['stockL'],$row['stockXL']);
            }
        }
        return $productos;
    }

    //crea un nuevo producto, con stock 0 
    public function crea($id, $nombre, $descripcion, $precio, $oferta, $xs, $s, $m, $l, $xl)
    {
        $prod = new Producto($id,$nombre,$descripcion,$precio,$oferta,$xs,$s,$m,$l,$xl);
        return self::guarda($prod);
    }

    //inserta nuevo producto
    private function inserta($producto)
    {
        $query=sprintf("INSERT INTO productos(nombre, descripcion, precio, oferta, stockXS, stockS, stockM, stockL,stockXL) VALUES ('%s', '%s', '%f','%f','%d', '%d', '%d','%d','%d')"
            , $this->conn->real_escape_string($producto->getNombre())
            , $this->conn->real_escape_string($producto->getDescripcion())
            , $this->conn->real_escape_string($producto->getPrecio())
			, $this->conn->real_escape_string($producto->getOferta())
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
    
    //borra la cantidad del producto
    public function borraCantidad($idProducto, $talla, $cantidad)
    {
        if (!$idProducto) {
            return false;
        } 
        if (!$talla) {
            return false;
        } 
        $stockColumn = "stock" . strtoupper($talla); // obtener el nombre de la columna de stock correspondiente
        $query = sprintf("UPDATE productos SET $stockColumn = $stockColumn - %d WHERE id = %d", $cantidad, $idProducto);

        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        
        return true;
    }
	
	  //borra la cantidad del producto
    public function borrarStock($idProducto)
    {
        if (!$idProducto) {
            return false;
        } 
       

       $query=sprintf("UPDATE productos SET stockXS = '%d', stockS = '%d', stockM = '%d', stockL = '%d',stockXL = '%d' where id = '%d'"
            , 0
            , 0
            , 0
            , 0
            , 0
			, $idProducto
        );

        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        
        return true;
    }
	
	//actualiza el producto
    public function actualiza($producto)
    {
		$idProducto = $producto->getId();
        if (!$idProducto) {
            return false;
        } 

		$query=sprintf("UPDATE productos SET nombre = '%s', descripcion = '%s', precio = '%f', oferta = '%f', stockXS = '%d', stockS = '%d', stockM = '%d', stockL = '%d',stockXL = '%d' where id = '%d'"
            , $this->conn->real_escape_string($producto->getNombre())
            , $this->conn->real_escape_string($producto->getDescripcion())
            , $this->conn->real_escape_string($producto->getPrecio())
			, $this->conn->real_escape_string($producto->getOferta())
            , $producto->getStockXS()
            , $producto->getStockS()
            , $producto->getStockM()
            , $producto->getStockL()
            , $producto->getStockXL()
			, $idProducto
        );
		
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        
        return true;
    }
    
    //guarda el producto en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($producto)
    {
        if ($producto->getId() != null) {
            return self::actualiza($producto); 
        }else{
			return self::inserta($producto);
		}
    }
}
?>