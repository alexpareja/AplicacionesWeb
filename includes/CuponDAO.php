<?php

namespace es\ucm\fdi\aw;

class CuponDAO 
{
    private $conn;
    public function __construct() 
    {
        $this->conn = Aplicacion::getInstance()->getConexionBd();
    }

    //busca los Cupon por codigo
    public function buscaPorCodigo($codCupon)
    {
        $query = sprintf("SELECT * FROM cupones WHERE codigo='%s' ", $codCupon);
        $rs = $this->conn->query($query);
        
        if($rs->num_rows>0){
            $row=$rs->fetch_assoc();
			if($row){
            $cupon = new Cupon($row['id'], $row['codigo'], $row['descuento'], $row['fechaExpiracion']);
			$rs->free();
			return $cupon;
			}
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }


    //busca el cupon por el id
    public function buscaPorId($id)
    {
        $query = sprintf("SELECT * FROM cupones WHERE id=%d", $id);
        $rs = $this->conn->query($query);
        if ($rs->num_rows>0) {
            $fila = $rs->fetch_assoc();
            if($fila){
              $cupon = new Cupon($row['id'], $row['codigo'], $row['descuento'], $row['fechaExpiracion']);
            $rs->free();

            return $comentario;
            }
        } else {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
        }
        return false;
    }

    //crea un nuevo cupon
    public function crea($codigo, $descuento, $fechaExpiracion)
    {
        $cupon = new Cupon($nuevaId=null,$codigo, $descuento, $fechaExpiracion);
        return self::inserta($cupon);
    }

    public function actualiza($id,$codigo, $descuento, $fechaExpiracion)
    {
        if (!$id) {
            return false;
        } 
		$query=sprintf("UPDATE cupones SET (codigo, descuento, fechaExpiracion) VALUES ('%d','%d','%s') where id = '%d'"
            , $this->conn->real_escape_string($codigo)
			, $this->conn->real_escape_string($descuento)
			, $this->conn->real_escape_string($fechaExpiracion)
            , $id
        );
		
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        
        return true;
    }

    //inserta nuevo producto
    private function inserta($cupon)
    {
        $query=sprintf("INSERT INTO cupones(codigo, descuento, fechaExpiracion) VALUES ('%d', '%s', '%d')"
            , $this->conn->real_escape_string($cupon->getCodigo())
            , $this->conn->real_escape_string($cupon->getDescuento())
            , $this->conn->real_escape_string($cupon->getFechaExpiracion())
        );
        if ( $this->conn->query($query) ) {
            $cupon->setId($this->conn->insert_id);
            return $cupon;
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
    
        $query = sprintf("DELETE FROM cupones WHERE id =%d",$id);
        if ( ! $this->conn->query($query) ) {
            error_log("Error BD ({$this->conn->errno}): {$this->conn->error}");
            return false;
        }
        return true;
    }
}
?>