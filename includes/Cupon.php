<?php
namespace es\ucm\fdi\aw;

class Cupon
{
    private $id;
    private $codigo;
    private $descuento;
    private $fechaExpiracion;

    public function __construct($id=null, $codigo, $descuento, $fechaExpiracion)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->descuento = $descuento;
        $this->fechaExpiracion = $fechaExpiracion;
    }

    public static function buscaPorId($id)
    {
        $CuponDAO= new CuponDAO();
        return $CuponDAO->buscaPorId($id);
    }

    public static function buscaPorCodigo($codCupon)
    {
        $CuponDAO= new CuponDAO();
        return $CuponDAO->buscaPorCodigo($codCupon);
    }
    
    public static function crea($codigo, $descuento, $fechaExpiracion)
    {
        $CuponDAO= new CuponDAO();
        return $CuponDAO->crea($codigo, $descuento, $fechaExpiracion);
    }

    public static function edita($id,$codigo, $descuento, $fechaExpiracion)
    {
        $CuponDAO= new CuponDAO();
        return $CuponDAO->actualiza($id,$codigo, $descuento, $fechaExpiracion);
    }

    public static function borra($id)
    {
        $CuponDAO= new CuponDAO();
        return $CuponDAO->borra($id);
    }
    
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($nuevaId)
    {
        $this->id=$nuevaId;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getFechaExpiracion()
    {
        return $this->fechaExpiracion;
    }
}
?>