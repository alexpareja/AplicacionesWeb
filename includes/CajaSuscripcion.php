<?php
namespace es\ucm\fdi\aw;

class CajaSuscripcion
{
    private $id;
    private $usuario;
    private $fechaCaja;

    public function __construct($id=null, $usuario, $fechaCaja)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->fechaCaja = $fechaCaja;
    }

    public static function buscaPorId($id)
    {
        $CajaSuscripcionDAO= new CajaSuscripcionDAO();
        return $CuponDAO->buscaPorId($id);
    }

    public static function buscaPorUsuario($usuario)
    {
        $CajaSuscripcionDAO= new CajaSuscripcionDAO();
        return $CajaSuscripcionDAO->buscaPorUsuario($usuario);
    }
    
    public static function crea($usuario, $fechaCaja)
    {
        $CajaSuscripcionDAO= new CajaSuscripcionDAO();
        return $CajaSuscripcionDAO->crea($usuario, $fechaCaja);
    }

    public static function edita($id, $usuario, $fechaCaja)
    {
        $CajaSuscripcionDAO= new CajaSuscripcionDAO();
        return $CajaSuscripcionDAO->actualiza($id, $usuario, $fechaCaja);
    }

    public static function borra($id)
    {
        $CajaSuscripcionDAO= new CajaSuscripcionDAO();
        return $CajaSuscripcionDAO->borra($id);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($nuevaId)
    {
        $this->id=$nuevaId;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getFechaCaja()
    {
        return $this->fechaCaja;
    }
}
?>