<?php
namespace es\ucm\fdi\aw;

class ComentariosProd
{
    private $id;

    private $entradaBlog;

    private $usuario;

    private $contenido;
    
    private $fecha;

    private $review;

    public function __construct($id=null, $entradaBlog, $usuario, $contenido, $fecha,$review)
    {
        $this->id = $id;
        $this->entradaBlog = $entradaBlog;
        $this->usuario = $usuario;
        $this->contenido = $contenido;
        $this->fecha=$fecha;
        $this->review=$review;
    }

    public static function buscaPorId($id)
    {
        $ComentariosProdDAO= new ComentariosProdDAO();
        return $ComentariosProdDAO->buscaPorId($id);
    }

    public static function buscaPorProducto($idProd)
    {
        $ComentariosProdDAO= new ComentariosProdDAO();
        return $ComentariosProdDAO->buscaPorProducto($idProd);
    }

    public static function crea($entradaBlog, $usuario, $contenido,$review)
    {
        $ComentariosProdDAO= new ComentariosProdDAO();
        return $ComentariosProdDAO->crea($entradaBlog, $usuario, $contenido,$review);
    }

    public static function edita($id,$contenido)
    {
        $ComentariosProdDAO= new ComentariosProdDAO();
        return $ComentariosProdDAO->actualiza($id,$contenido);
    }

    public static function borra($id)
    {
        $ComentariosProdDAO= new ComentariosProdDAO();
        return $ComentariosProdDAO->borra($id);
    }
    
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($nuevaId)
    {
        $this->id=$nuevaId;
    }

    public function getEntradaBlog()
    {
        return $this->entradaBlog;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function getReview()
    {
        return $this->review;
    }
}
?>