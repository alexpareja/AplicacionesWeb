<?php

namespace es\ucm\fdi\aw;

class CajaSuscripcionDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();
    }

    //busca la caja por usuario
    public function buscaPorUsuario($usuario)
    {
        $query = sprintf("SELECT * FROM suscripcion WHERE usuario='%d' ", $usuario);
        $rs = $this->conn->query($query);
        
        if($rs->num_rows>0){
            $row=$rs->fetch_assoc();
			if($row){
            $cajaSuscripcion = new CajaSuscripcion($row['id'], $row['usuario'], $row['fechaCaja']);
			$rs->free();
			return $cajaSuscripcion;
			}
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //crea una nueva caja
    public function crea($usuario, $fechaCaja)
    {
        $cajaSuscripcion = new cajaSuscripcion($nuevaId=null,$usuario, $fechaCaja);
        return self::inserta($cajaSuscripcion);
    }

    public function actualiza($id, $usuario, $fechaCaja)
    {
        if (!$id) {
            return false;
        } 
		$query=sprintf("UPDATE suscripcion SET (usuario, fechaCaja) VALUES ('%d', '%s') where id = '%d'"
            , $this->conn->real_escape_string($usuario)
			, $this->conn->real_escape_string($fechaCaja)
            , $id
        );
		
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        
        return true;
    }

    //inserta nueva caja
    private function inserta($cajaSuscripcion)
    {
        $query=sprintf("INSERT INTO suscripcion(usuario, fechaCaja) VALUES ('%d', '%s')"
            , $this->conn->real_escape_string($cajaSuscripcion->getUsuario())
            , $this->conn->real_escape_string($cajaSuscripcion->getFechaCaja())
        );
        if ( $this->conn->query($query) ) {
            $cajaSuscripcion->setId($this->conn->insert_id);
            return $cajaSuscripcion;
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }


    //borra la caja
    public function borra($id)
    {
        if (!$id) {
            return false;
        } 
    
        $query = sprintf("DELETE FROM suscripcion WHERE id =%d",$id);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
}
?>