<?php

namespace es\ucm\fdi\aw;

class ComentariosProdDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();

    }

    //busca los comentarios del producto
    public function buscaPorProducto($idProd)
    {
        $query = sprintf("SELECT * FROM comentariosproducto WHERE producto='%d'", $idProd);
        $rs = $this->conn->query($query);
        $comentarios=array();
        if($rs->num_rows>0){
            while($row=$rs->fetch_assoc())
            {
                $id=$row['id'];
                $comentarios[$id] = new ComentariosProd($row['id'], $row['producto'], $row['usuario'], $row['contenido'], 
                $row['fecha'], $row['review']);
            }
        
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return  $comentarios;
    }


    //busca la entrada por el id
    public function buscaPorId($id)
    {
        $query = sprintf("SELECT * FROM comentariosproducto WHERE id=%d", $id);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
            $comentario = new ComentariosProd($fila['id'], $fila['producto'], $fila['usuario'], $fila['contenido'], 
            $fila['fecha'], $fila['review']);
            $rs->free();

            return $comentario;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //crea un nuevo comentario
    public function crea($producto, $usuario, $contenido,$review)
    {
        $comentario = new ComentariosProd($nuevaId=null,$producto,$usuario,$contenido,date('Y-m-d H:i:s'),$review);
        return self::inserta($comentario);
    }

    public function actualiza($id,$contenido)
    {
        if (!$id) {
            return false;
        } 
		$query=sprintf("UPDATE comentariosproducto SET contenido = '%s' where id = '%d'"
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
        $query=sprintf("INSERT INTO comentariosproducto(producto, usuario, contenido, fecha, review) VALUES ('%d', '%d', '%s','%s','%d')"
            , $this->conn->real_escape_string($comentario->getEntradaBlog())
            , $this->conn->real_escape_string($comentario->getUsuario())
            , $this->conn->real_escape_string($comentario->getContenido())
            , $this->conn->real_escape_string($comentario->getFecha())
            , $this->conn->real_escape_string($comentario->getReview())
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
    
        $query = sprintf("DELETE FROM comentariosproducto WHERE id =%d",$id);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
}
?>