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
            $fila['autor'], $fila['categoria']);
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
            $fila['autor'], $fila['categoria']);
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
                $row['autor'], $row['categoria']);
            }
        }
        return $blog;
    }

    //crea una nueva entrada
    public function crea($titulo, $contenido, $descripcion, $autor, $categoria)
    {
        $blog = new Blog($nuevaId=null,$titulo,$contenido,$descripcion,$autor,$categoria);
        return self::inserta($blog);
    }

    public function actualiza($id,$titulo,$contenido,$descripcion,$categoria)
    {
        if (!$id) {
            return false;
        } 
		$query=sprintf("UPDATE blog SET titulo = '%s', contenido = '%s', descripcion = '%s', categoria = '%s' where id = '%d'"
            , $this->conn->real_escape_string($titulo)
            , $this->conn->real_escape_string($contenido)
            , $this->conn->real_escape_string($descripcion)
            , $this->conn->real_escape_string($categoria)
            , $id
        );
		
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        
        return true;
    }

    //inserta nuevo producto
    private function inserta($blog)
    {
        $query=sprintf("INSERT INTO blog(titulo, contenido, descripcion, autor, categoria) VALUES ('%s', '%s', '%s','%d','%s')"
            , $this->conn->real_escape_string($blog->getTitulo())
            , $this->conn->real_escape_string($blog->getContenido())
            , $this->conn->real_escape_string($blog->getDescripcion())
            , $blog->getAutor()
            , $this->conn->real_escape_string($blog->getCategoria())
        );
        if ( $this->conn->query($query) ) {
            $blog->setId($this->conn->insert_id);
            return $blog;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }


    //borra el producto
    public function borra($id)
    {
        if (!$id) {
            return false;
        } 
    
        $query = sprintf("DELETE FROM blog WHERE id =%d",$id);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
}
?>