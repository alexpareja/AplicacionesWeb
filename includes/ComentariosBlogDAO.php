<?php

namespace es\ucm\fdi\aw;

class ComentariosBlogDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();

    }

    //busca los comentarios de la entrada del blog
    public function buscaPorEntrada($idBlog)
    {
        $query = sprintf("SELECT * FROM comentariosblog WHERE entradaBlog='%d'", $idBlog);
        $rs = $this->conn->query($query);
        $comentarios=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $comentarios[$id] = new ComentariosBlog($fila['id'], $fila['entradaBlog'], $fila['usuario'], $fila['contenido'], 
                $fila['fecha'], $fila['respuesta']);
            }
        
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

     //busca los comentarios respuesta de otro comentario
     public function buscaPorRespuesta($idComentario)
     {
         $query = sprintf("SELECT * FROM comentariosblog WHERE respuesta='%d'", $idComentario);
         $rs = $this->conn->query($query);
         $comentarios=array();
         if($rs->num_rows>0){
             while($row=$rs->fetch_assoc())
             {
                 $id=$row['id'];
                 $comentarios[$id] = new ComentariosBlog($fila['id'], $fila['entradaBlog'], $fila['usuario'], $fila['contenido'], 
                 $fila['fecha'], $fila['respuesta']);
             }
         
         } else {
             error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
         }
         return false;
     }

    //busca la entrada por el id
    public function buscaPorId($id)
    {
        $query = sprintf("SELECT * FROM comentariosblog WHERE id=%d", $id);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $comentario = new ComentariosBlog($fila['id'], $fila['entradaBlog'], $fila['usuario'], $fila['contenido'], 
            $fila['fecha'], $fila['respuesta']);
            $rs->free();

            return $comentario;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //crea un nuevo comentario
    public function crea($entradaBlog, $usuario, $contenido,$respuesta)
    {
        $comentario = new ComentariosBlog($nuevaId=null,$entradaBlog,$usuario,$contenido,date('Y-m-d H:i:s'),$respuesta);
        return self::inserta($comentario);
    }

    public function actualiza($id,$contenido)
    {
        if (!$id) {
            return false;
        } 
		$query=sprintf("UPDATE comentariosblog SET contenido = '%s' where id = '%d'"
            , $this->conn->real_escape_string($contenido)
            , $id
        );
		
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        
        return true;
    }

    //inserta nuevo producto
    private function inserta($comentario)
    {
        $query=sprintf("INSERT INTO comentariosblog(entradaBlog, usuario, contenido, fecha, respuesta) VALUES ('%d', '%d', '%s','%s','%d')"
            , $this->conn->real_escape_string($blog->getEntradaBlog())
            , $this->conn->real_escape_string($blog->getUsuario())
            , $this->conn->real_escape_string($blog->getContenido())
            , $this->conn->real_escape_string($blog->getFecha())
            , $this->conn->real_escape_string($blog->getRespuesta())
        );
        if ( $this->conn->query($query) ) {
            $comentario->setId($this->conn->insert_id);
            return $comentario;
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
    
        $query = sprintf("DELETE FROM comentariosblog WHERE id =%d",$id);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
}
?>