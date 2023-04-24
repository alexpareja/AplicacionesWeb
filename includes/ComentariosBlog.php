<?php
namespace es\ucm\fdi\aw;

class ComentariosBlog
{
    private $id;

    private $entradaBlog;

    private $usuario;

    private $contenido;
    
    private $fecha;

    private $respuesta;

    public function __construct($id=null, $entradaBlog, $usuario, $contenido, $fecha,$respuesta)
    {
        $this->id = $id;
        $this->entradaBlog = $entradaBlog;
        $this->usuario = $usuario;
        $this->contenido = $contenido;
        $this->fecha=$fecha;
        $this->respuesta=$respuesta;
    }

    public static function buscaPorId($id)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $ComentariosBlogDAO->buscaPorId($id);
    }

    public static function buscaPorEntrada($idBlog)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $BlogDAO->buscaPorTitulo($idBlog);
    }

    public static function buscaPorRespuesta($idRespuesta)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $BlogDAO->buscaPorTitulo($idRespuesta);
    }

    
    public static function crea($entradaBlog, $usuario, $contenido)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $ComentariosBlogDAO->crea($entradaBlog, $usuario, $contenido,null);
    }

    public static function responde($entradaBlog, $usuario, $contenido,$respuesta)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $ComentariosBlogDAO->crea($entradaBlog, $usuario, $contenido,$respuesta);
    }
    public static function edita($id,$contenido)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $ComentariosBlogDAO->actualiza($id,$contenido);
    }

    public static function borra($id)
    {
        $ComentariosBlogDAO= new ComentariosBlogDAO();
        return $ComentariosBlogDAO->borra($id);
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
    public function getRespuesta()
    {
        return $this->respuesta;
    }
}
?>