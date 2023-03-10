<?php
include_once ("ProductoDAO.php");

class Producto
{
    private $id;

    private $nombre;

    private $descripcion;

    private $precio;

    private $stockXS;

    private $stockS;

    private $stockM;

    private $stockL;

    private $stockXL;

    public function __construct($id=null, $nombre, $descripcion, $precio, $stockXS,$stockS,$stockM,$stockL,$stockXL)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stockM = $stockM;
        $this->stockXS=$stockXS;
        $this->stockS=$stockS;
        $this->stockM=$stockM;
        $this->stockL=$stockL;
        $this->stockXL=$stockXL;
    }

    public static function buscaPorId($idProducto)
    {
        $ProductoDAO= new ProductoDAO();
        return $ProductoDAO->buscaPorId($idProducto);
    }

    public static function buscaPorNombre($nombreProducto)
    {
        $ProductoDAO= new ProductoDAO();
        return $ProductoDAO->buscaPorNombre($nombreProducto);
    }

    //devuelve en un array todos los productos de la tienda
    public static function getTienda()
    {
        $ProductoDAO= new ProductoDAO();
        return $ProductoDAO->getTienda();
    }

    public static function crea($nombre, $descripcion, $precio)
    {
        $ProductoDAO= new ProductoDAO();
        return $ProductoDAO->crea($nombre, $descripcion, $precio);
    }

    public function borra($producto)
    {
        $ProductoDAO= new ProductoDAO();
        return $ProductoDAO->borra($producto->id);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($nuevaId)
    {
        $this->id=$nuevaId;
    }



    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStockXS()
    {
        return $this->stockXS;
    }

    public function getStockS()
    {
        return $this->stockS;
    }

    public function getStockM()
    {
        return $this->stockM;
    }

    public function getStockL()
    {
        return $this->stockL;
    }

    public function getStockXL()
    {
        return $this->stockXL;
    }
}
?>