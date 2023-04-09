<?php

namespace es\ucm\fdi\aw;

class BlogDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();

    }

    //busca la entrada por el nombre
    public function buscaPorTitulo($tituloBlog)
    {
        $query = sprintf("SELECT * FROM blog WHERE titulo='%s'", $tituloBlog);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $blog = new Blog($fila['id'], $fila['titulo'], $fila['contenido'], $fila['descripcion'], 
            $fila['autor']);
            $rs->free();

            return $blog;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //busca la entrada por el id
    public function buscaPorId($idBlog)
    {
        $query = sprintf("SELECT * FROM blog WHERE id=%d", $idBlog);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $blog = new Blog($fila['id'], $fila['titulo'], $fila['contenido'], $fila['descripcion'], 
            $fila['autor']);
            $rs->free();

            return $blog;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //devuelve todos las entradas del blog
    public function getBlog()
    {
        $query = "SELECT * FROM blog";

        $rs = $this->conn->query($query);
        $blog=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $blog[$id] = new Blog($row['id'], $row['titulo'], $row['contenido'], $row['descripcion'], 
                $row['autor']);
            }
        }
        return $blog;
    }

    //crea una nueva entrada
    public function crea($titulo, $contenido, $descripcion, $autor)
    {
        $blog = new Blog($nuevaId=null,$titulo,$contenido,$descripcion,$autor);
        return self::guarda($blog);
    }

    //inserta nuevo producto
    private function inserta($blog)
    {
        $query=sprintf("INSERT INTO blog(titulo, contenido, descripcion, autor) VALUES ('%s', '%s', '%s','%d')"
            , $this->conn->real_escape_string($blog->getTitulo())
            , $this->conn->real_escape_string($blog->getContenido())
            , $this->conn->real_escape_string($blog->getDescripcion())
            , $blog->getAutor()
        );
        if ( $this->conn->query($query) ) {
            $blog->setId($this->conn->insert_id);
            return $blog;
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
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
    
    //guarda la entrada en la bbdd. Si existe lo actualiza y si no lo crea
    public function guarda($blog)
    {
        if ($blog->getId() !== null) {
            //return self::actualiza($producto); 
        }
        return self::inserta($blog);
    }
}
?>