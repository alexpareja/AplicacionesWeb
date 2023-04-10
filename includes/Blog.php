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

    public static function crea($titulo, $contenido, $descripcion, $autor)
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->crea($titulo, $contenido, $descripcion, $autor);
    }

    public static function edita($id,$titulo, $contenido, $descripcion)
    {
        $BlogDAO= new BlogDAO();
        if(!$id)  {return true;}
        return $BlogDAO->actualiza($id,$titulo, $contenido, $descripcion);
    }

    public static function borra($id)
    {
        $BlogDAO= new BlogDAO();
        return $BlogDAO->borra($id);
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