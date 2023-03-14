<?php
include_once ("CompraDAO.php");
include_once ("Usuario.php");
include_once ("Producto.php");

class Compra
{
    private $id;

    private $idUsuario;

    private $idProducto;

    private $fecha;

    private $cantidad;

    private $precio;

    public function __construct($id=null, $idUsuario, $idProducto, $fecha, $cantidad,$precio)
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->precio=$precio;
    }

    public static function buscaPorID($idCompra)
    {
        $compraDAO= new compraDAO();
        return $compraDAO->buscaPorUsuario($idCompra);
    }

    public static function crea($idUsuario, $idProducto, $cantidad,$precio)
    {
        $compraDAO= new CompraDAO();
        return $usuarioDAO->crea($idUsuario, $idProducto, date('Y-m-d H:i:s'),$cantidad,$precio);
    }

    //borra la compra
    public function borra($compra)
    {
        $compraDAO= new compraDAO();
        return $compraDAO->borra($compra->id);
    }
   
    //obtiene en un array todas las compras->se puede actualizar para obtener compras concretas (todas las compras del último mes por ej)
    public static function getAllCompras()
    {
        $compraDAO= new compraDAO();
        return $compraDAO->getAllCompras();
    }

    //obtiene en un array todas las compras de un usuario
    public static function getAllComprasUsuario($idUsuario)
    {
        $compraDAO= new compraDAO();
        return $compraDAO->getAllComprasUsuario($idUsuario);
    }
   

    public function getId()
    {
        return $this->id;
    }

    public function setId($nuevaId)
    {
        $this->id=$nuevaId;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}
?>