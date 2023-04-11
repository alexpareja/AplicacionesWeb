<?php
namespace es\ucm\fdi\aw;

class Favoritos
{
    private $id;

    private $usuario;

    private $producto;

    public function __construct($id=null, $usuario, $producto)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->producto = $producto;
    }

    public static function buscaPorId($idFav)
    {
        $FavoritosDAO= new FavoritosDAO();
        return $FavoritosDAO->buscaPorId($idFav);
    }

    public static function buscaPorTitulo($tituloFav)
    {
        $FavoritosDAO= new FavoritosDAO();
        return $FavoritosDAO->buscaPorTitulo($tituloFav);
    }

    public static function getFavoritos()
    {
        $FavoritosDAO= new FavoritosDAO();
        return $FavoritosDAO->getFavoritos();
    }

    public static function crea($usuario, $producto)
    {
        $FavoritosDAO= new FavoritosDAO();
        return $FavoritosDAO->crea($usuario, $producto);
    }

    public static function edita($id, $usuario, $producto)
    {
        $FavoritosDAO= new FavoritosDAO();
        if(!$id)  {return true;}
        return $FavoritosDAO->actualiza($id, $usuario, $producto);
    }

    public static function borra($id)
    {
        $FavoritosDAO= new FavoritosDAO();
        return $FavoritosDAO->borra($id);
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

    public function getProducto()
    {
        return $this->producto;
    }
}
?>