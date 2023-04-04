<?php
namespace es\ucm\fdi\aw;

class Blog
{
    private $id;

    private $titulo;

    private $contenido;

    private $descripcion;
    
    private $autor;

    public function __construct($id=null, $titulo, $contenido, $descripcion, $autor)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->autor=$autor;
    }

    public static function buscaPorId($idBlog)
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->buscaPorId($idBlog);
    }

    public static function buscaPorTitulo($tituloBlog)
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->buscaPorTitulo($tituloBlog);
    }

    //devuelve en un array todos los productos de la tienda
    public static function getBlog()
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->getBlog();
    }

    public static function crea($descripcion, $titulo, $contenido, $autor)
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->crea($descripcion, $titulo, $contenido, $autor);
    }

    public function borra($entrada)
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->borra($entrada->id);
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

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function getAutor()
    {
        return $this->autor;
    }
}
?>